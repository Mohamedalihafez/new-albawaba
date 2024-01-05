<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class City extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'region_id','name_ar','name_en',''																	
   ];

   static function upsertInstance($request)
    {   
        $city = City::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
        );

        return $city;
    }


    static function fetchRegion($request)
    {
        $data = City::where("region_id", $request->region_id)->get(["name_ar", "id"]);
        return $data;
    }

    public function getCountAttribute()
    {
        return $this->count();
    }

    public function deleteInstance()
    {
        return $this->delete();
    }

    //Scopes
    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name_ar','like','%'.$request['name'].'%');
        }

        return $query;
    }

    public function region()
    {
      return  $this->belongsTo(Region::class, 'region_id');
    }


}
