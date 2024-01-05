<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title' ,'description', 'section_number',
   ];

    static function upsertInstance($request)
    {

        $service = Service::updateOrCreate(
        [
            'id' => $request->id ?? null
        ],
            $request->all()
        );

        $logo = 'logo_'.$service->id.'.png';

        if ($request->file('logo')) {
            $request->file('logo')->move('services/'.$service->id.'/',$logo);

            $service->gallaries()->updateOrCreate(
            [
                'imageable_id' => $service->id,
                'use_for' => 'logo'
            ],
            [
                'name' => $logo,
                'use_for' => 'logo'
            ]);
        }

        return $service;    
    }

    //Relations


    public function gallaries()
    {
        return $this->morphMany(Gallary::class, 'imageable');
    }

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }
    
     public function deleteInstance()
    {
        return $this->delete();
    }


    public function logo()
    {
        return $this->morphOne(Gallary::class,'imageable')->where('use_for','logo');
    }

    
}
