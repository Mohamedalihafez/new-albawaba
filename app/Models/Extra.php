<?php

namespace App\Models;

use App\Models\Scopes\ExtraScope;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Extra extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'building_id',
    ];

    protected static function booted()
    { 
        if(Auth::hasUser())
        {
            if(! Auth::user()->isSuperAdmin())
            {
                static::addGlobalScope(new TenantScope(''));
            } 
        } 
    }

    static function upsertInstance($request)
    {  
        $building = Building::where('id' , $request->building_id )->first();

        $request->merge([
            'category_id' =>  $building->category_id
        ]);

        $extra = Extra::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
            );

        return $extra;
    }

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }

    static function fetchCategory($request)
    {
        $data = Extra::where("building_id", $request->building_id)->get(["name", "id"]);
        return $data;
    }



    public function deleteInstance()
    {
        return $this->delete();
    }



    public function category()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }


}
