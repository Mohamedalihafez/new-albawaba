<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.city.index',[
                'cities' => City::filter($request->all())->paginate(50),
                
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(City $city)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.city.upsert',[
                'city' => $city,
                'regions'=>Region::get(),
            ]);
        else 
            abort(404);
    }

    public function cities(Request $request)
    {
        return City::citieselect($request);
    }

    public function modify(CityRequest $request)
    {
        return City::upsertInstance($request);
    }

    public function destroy(City $city)
    {
        return $city->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.city.index',[
            'cities' => City::filter($request->all())->paginate(50)
        ]);
    }
}
