<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Building;
use App\Models\Category;
use App\Models\Item;
use App\Models\Setting;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $advertisements = Advertisement::where('seen',1)->paginate(40);
        $partners = Partner::all();
        $buildings = Building::all();
        $categories = Category::all();
        $setting = Setting::where('section_id',1)->first();
        $features = Setting::where('id',4)->first();

        return view('pages.index' , ['advertisements' =>  $advertisements , 'partners' => $partners , 'categories' => $categories , 'buildings' =>  $buildings ,'setting' => $setting , 'features'=> $features]);
    }
}
