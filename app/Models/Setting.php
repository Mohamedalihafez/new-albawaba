<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;


class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_1' ,'title_2','description','privacy','policy' ,'section_id','user_id'
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


        $setting = Setting::updateOrCreate(
        [
            'id' => $request->id ?? null
        ],
            $request->all()
        );

        if($request->setting_images)
        {
            foreach($request->setting_images as $key => $result){
    
                $imageName = 'ads_' . $setting->id .'_' .$result->getClientOriginalName()  . '.png';
                $result->move('setting/' . $setting->id . '/', $imageName);
                $setting->gallaries()->updateOrCreate(
                    [
                        'imageable_id' => $setting->id,
                        'name' => $imageName,
                        'use_for' => 'setting'
                    ],
                    [
                        'imageable_id' => $setting->id,
                        'second_id' => $key,
                        'name' => $imageName,
                        'use_for' => 'setting'
                    ]);    
            }
        }



        return $setting;    
    }

    static function upsertPrivacy($request)
    {
        $setting = Setting::updateOrCreate(
        [
            'id' => $request->id ?? null
        ],
            $request->all()
        );
        
        if ($request->file('logo')) {
            $logo = 'logo_'.$setting->id.'.png';
            $request->file('logo')->move('features/'.$setting->id.'/',$logo);

            $setting->gallaries()->updateOrCreate(
            [
                'imageable_id' => $setting->id,
                'use_for' => 'logo'
            ],
            [
                'name' => $logo,
                'use_for' => 'logo'
            ]);
        
        }

 
    }
    static function fetchImage($request)
    {
        $data = Gallary::where("id", $request->image_id)->first();
        if ($data) 
        {
            $data->delete();
        }
        return $data;
    }


    public function gallaries()
    {
        return $this->morphMany(Gallary::class, 'imageable');
    }
    
    public function logo()
    {
        return $this->morphOne(Gallary::class,'imageable')->where('use_for','logo');
    }



    public function deleteInstance()
    {
        return $this->delete();
    }

}
