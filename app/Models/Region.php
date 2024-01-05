<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'region_id' ,'capital_city_id' ,'code','name_ar','name_en','population'																	
   ];

   static function upsertInstance($request)
   {   
       $region = Region::updateOrCreate(
           [
               'id' => $request->id ?? null
           ],
               $request->all()
       );

       return $region;
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


}
