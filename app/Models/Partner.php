<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name' ,'phone', 'partner_type',
   ];

    static function upsertInstance($request)
    {

        $partner = Partner::updateOrCreate(
        [
            'id' => $request->id ?? null
        ],
            $request->all()
        );

        $logo = 'logo_'.$partner->id.'.png';

        if ($request->file('logo')) {
            $request->file('logo')->move('partner/'.$partner->id.'/',$logo);

            $partner->gallaries()->updateOrCreate(
            [
                'imageable_id' => $partner->id,
                'use_for' => 'logo'
            ],
            [
                'name' => $logo,
                'use_for' => 'logo'
            ]);
        }

        return $partner;    
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
