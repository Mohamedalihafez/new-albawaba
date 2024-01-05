<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.contact');
    }
    
    public function privacy()
    {
        $setting = Setting::where('id',2)->first();
        return view('pages.privacy' , ['setting'=> $setting]);
    }
    
    public function policy()
    {
        $setting = Setting::where('id',3)->first();
        return view('pages.policy' , ['setting'=> $setting]);
    }
    
    public function modify(ContactRequest $request)
    {
        Contact::upsertInstance($request);
        return redirect()->route('contact');
    }
}
