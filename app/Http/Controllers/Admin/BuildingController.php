<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\BuildingRequest;
use App\Models\Building;
use App\Models\Category;
use App\Models\Compound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.building.index',[
                'buildings' => Building::filter($request->all())->paginate(10),
            ]);
        else 
            abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Building $building)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.building.upsert',[
                'building' => $building,
                'categories'=>Category::get(),
            ]);
        else 
            abort(404);
    }
    public function fetchBuilding(Request $request)
    {
       return Building::fetchBuilding($request);
    }

    public function modify(BuildingRequest $request)
    {
        return Building::upsertInstance($request);
    }
    public function buildings(Request $request)
    {
        return Building::buildingSelect($request);
    }

    public function destroy(Building $building)
    {
        return $building->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.building.index',[
            'buildings' => Building::filter($request->all())->paginate(10)
        ]);
    }
}
