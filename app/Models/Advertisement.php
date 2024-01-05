<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;


class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title' ,'ads_owner','building_id' ,'category_id' , 'code' , 'hours' , 'expired_at' ,'description', 'currentLat','currentLng','region_id','city_id' ,'district'	 ,'street','ads_type','license_id','street_type','face_type','width','age','rooms','halls','bathrooms','flats','ads_direction','floors'	,'stores_number','phone', 'country_code','question_1','question_2','question_3','phone_2','link','price','location','seen'	,'user_id'
   ];

    protected static function booted()
    { 
        if(Auth::hasUser())
        {
            if(! Auth::user()->isSuperAdmin())
            {
                static::addGlobalScope(new TenantScope('advertisements'));
            } 
        }
    }
   
    static function upsertInstance($request)
    {
        $newDateTime = Carbon::now()->addHours(24); 
        
        if(!$request->id)
        {
            $request->merge([
                'user_id' => Auth::user()->id ,
                'expired_at' => $newDateTime ,
            ]);
        }
        

        $advertisement = Advertisement::updateOrCreate(
        [
            'id' => $request->id ?? null
        ],
            $request->all()
        );

        if($request->ads_images)
        {
            foreach($request->ads_images as $key => $result){
    
                $imageName = 'ads_' . $advertisement->id .'_' .$result->getClientOriginalName()  . '.png';
                $result->move('ads/' . $advertisement->id . '/', $imageName);
                $advertisement->gallaries()->updateOrCreate(
                    [
                        'imageable_id' => $advertisement->id,
                        'name' => $imageName,
                        'use_for' => 'ads'
                    ],
                    [
                        'imageable_id' => $advertisement->id,
                        'second_id' => $key,
                        'name' => $imageName,
                        'use_for' => 'ads'
                    ]);    
            }
        }

        if($request->items)
        {
            $advertisement->items()->sync($request->items);
        }

        if($request->extras)
        {
            $advertisement->extras()->sync($request->extras);
        }

        return $advertisement;    
    }

    static function advertisementUpdate($request)
    {
        return Advertisement::where('id', $request->id)->update(['seen' => $request->status]);
    }

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('title','like','%'.$request['name'].'%');
        }

        return $query;
    }
    static function itemFilter($request)
    {
        $data = Item::where("category_id",1)->get(["name", "id"]);

        return $data;
    }

    //Relations
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function gallaries()
    {
        return $this->morphMany(Gallary::class, 'imageable');
    }

    public function region()
    {
      return  $this->belongsTo(Region::class, 'region_id');
    }

    public function city()
    {
      return  $this->belongsTo(City::class, 'city_id');
    }

    public function user()
    {
      return  $this->belongsTo(User::class, 'user_id');
    }

    public function building()
    {
      return  $this->belongsTo(Building::class, 'building_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class);
    }

    public function deleteInstance()
    {
        return $this->delete();
    }

}
