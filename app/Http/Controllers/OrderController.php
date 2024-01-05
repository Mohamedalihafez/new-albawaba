<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Region;

class OrderController extends Controller
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
        $regions = Region::all();
        $categories = Category::all();
        return view('pages.order' , ['regions' =>  $regions  , 'categories' => $categories]);
    }

    
    public function fetchAds(Request $request)
    {
       return Order::fetchAds($request);
    }

    public function modify(OrderRequest $request)
    {
        Order::upsertInstance($request);
        return redirect()->route('order');
    }
}
