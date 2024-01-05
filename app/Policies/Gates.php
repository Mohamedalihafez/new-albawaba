<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;

class Gates {

    static function policies()
    {
        //Advertisement
        Gate::define('view-advertisement',  [AdvertisementPolicy::class,'allowToShowAdvertisement']);
        Gate::define('upsert-advertisement',[AdvertisementPolicy::class,'allowToUpsertAdvertisement']);
        Gate::define('delete-advertisement',[AdvertisementPolicy::class,'allowToDeleteAdvertisement']);

  
    }

    static function resolve($route_name)
    {
        $gate = true;

        //Procedure
        if($route_name == 'advertisementadmin'){
            $gate = Gate::allows('view-advertisement');
        }
        if($route_name == 'advertisementadmin.upsert'){
            $gate = Gate::allows('upsert-advertisement');
        }
        if($route_name == 'advertisementadmin.delete'){
            $gate = Gate::allows('delete-advertisement');
        }

     

        return $gate;
    }
}











