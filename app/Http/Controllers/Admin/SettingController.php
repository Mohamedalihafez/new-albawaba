<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function upsert()
    {
        return view('admin.pages.settings.settings',[
            'setting' => Setting::where('section_id',1)->first(),
        ]);
    }
    
    public function privacy()
    {
         return view('admin.pages.settings.privacy',[
            'setting' => Setting::where('id',2)->first(),
        ]);
    }
    
    public function policy()
    {
         return view('admin.pages.settings.policy',[
            'setting' => Setting::where('id',4)->first(),
        ]);
    }
    
     public function features()
    {
         return view('admin.pages.settings.features',[
            'setting' => Setting::where('id',4)->first(),
        ]);
    }
    
    public function featuresModify(Request $request)
    {
        return Setting::upsertPrivacy($request);
    }
    
      public function servicesModify(Request $request)
    {
        return Setting::upsertPrivacy($request);
    }
    
    public function policyModify(Request $request)
    {
        return Setting::upsertPrivacy($request);
    }
    
    
    public function modify(Request $request)
    {
        return Setting::upsertInstance($request);
    }
       public function fetchImage(Request $request)
    {
       return Setting::fetchImage($request);
    }

}
