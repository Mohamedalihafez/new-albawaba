<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\Category;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.region.index',[
                'regions' => Region::filter($request->all())->paginate(10),
                
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Region $region)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.region.upsert',[
                'region' => $region,
                'categories'=>Category::get(),
                'users' => User::where('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }

    public function regions(Request $request)
    {
        return Region::regionSelect($request);
    }

    public function modify(RegionRequest $request)
    {
        return Region::upsertInstance($request);
    }

    public function destroy(Region $region)
    {
        return $region->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.region.index',[
            'regions' => Region::filter($request->all())->paginate(10)
        ]);
    }
}
