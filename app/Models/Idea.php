<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;
use Image;

class Idea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'ads_type',
        'city_id',
        'country_code',
        'category_id',
        'region_id',
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
        // static function upsertInstance($request)
        // {   
        //     $Idea = Idea::updateOrCreate(
        //         [
        //             'id' => $request->id ?? null
        //         ],
        //             $request->all()
        //         );

        //         $name = 'ads_image_'.$Idea->id.'.png';
                
        //         if ($request->file('ads_image')) {
        //             $request->file('ads_image')->move('Ideas/'.$Idea->id.'/',$name);
        //             $Idea->gallaries()->updateOrCreate(
        //                 [
        //                     'imageable_id' => $Idea->id,
        //                     'use_for' => 'ads_image'
        //                 ],
        //                 [
        //                     'name' => $name,
        //                     'use_for' => 'ads_image'
        //                 ]);
        //         }

        //     return $Idea;
        // }


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
    
    public function category()
    {
        return $this->belongsTo(Category::class ,'ads_type');
    }
    public function region()
    {
        return $this->belongsTo(Region::class ,'region_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class ,'city_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class ,'category_id');
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
