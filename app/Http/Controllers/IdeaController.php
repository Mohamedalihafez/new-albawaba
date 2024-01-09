<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Education;
use App\Models\Portfolio_experience1;
use App\Models\Portfolio_experience2;
use App\Models\Portfolio_experience3;
use App\Models\Reference;
use App\Models\Skill;
use App\Models\Slider;
use App\Models\Social_media;
use App\Models\User;
use App\Models\Work_experience;

class IdeaController extends Controller
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
        return view('pages.Ideas');
    }

    public function add(Request $request)
    {
        $slider = Slider::latest()->take(1)->get();
        $about = About::latest()->take(1)->get();
        $skill = Skill::latest()->take(1)->get();
        $social_media = Social_media::latest()->take(1)->get();
        $portfolio_experience1 = Portfolio_experience1::latest()->take(4)->get();
        $portfolio_experience2 = Portfolio_experience2::latest()->take(4)->get();
        $portfolio_experience3 = Portfolio_experience3::latest()->take(4)->get();
        $work_experience = Work_experience::latest()->take(3)->get();
        $education = Education::latest()->take(3)->get();
        $reference = Reference::latest()->take(5)->get();
        return view('pages.ideas-user',compact('slider','about','skill','portfolio_experience1','portfolio_experience2','portfolio_experience3','work_experience','education','reference','social_media')); 
    }

    public function request(Request $request)
    {
        return User::ideaRequest($request);
    }
    


}
