<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;
use Image;

class Proposal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_code',
        'comments',
    ];

    //Tenancy
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
        $proposal = Proposal::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
            );

            $name = 'perposal_'.$proposal->id.'.png';
            
            if ($request->file('perposal')) {
                $request->file('perposal')->move('proposals/'.$proposal->id.'/',$name);
                $proposal->gallaries()->updateOrCreate(
                    [
                        'imageable_id' => $proposal->id,
                        'use_for' => 'perposal'
                    ],
                    [
                        'name' => $name,
                        'use_for' => 'perposal'
                    ]);
            }

        return $proposal;
    }


    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }

    static function fetchAds($request)
    {
        $data = Building::where("category_id", $request->category_id)->get(["name", "id"]);
        return $data;
    }
    





    public function gallaries()
    {
        return $this->morphMany(Gallary::class, 'imageable');
    }

    public function deleteInstance()
    {
        return $this->delete();
    }

}
