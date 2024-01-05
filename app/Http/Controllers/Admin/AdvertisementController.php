<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Building;
use App\Models\City;
use App\Models\Extra;
use App\Models\Item;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.advertisement.index',[
                'advertisements_building' => Advertisement::where('category_id', 1)->filter($request->all())->paginate(50),
                'advertisements_vip' => Advertisement::where('category_id', 2)->filter($request->all())->paginate(50),
                'advertisements_commerce' => Advertisement::where('category_id', 3)->filter($request->all())->paginate(50),

        ]);
        else 
        {
            return view('admin.pages.advertisement.index',[
                'advertisements_building' => Advertisement::where('user_id',Auth::user()->id)->where('category_id', 1)->filter($request->all())->paginate(50),
                'advertisements_vip' => Advertisement::where('user_id',Auth::user()->id)->where('category_id', 2)->filter($request->all())->paginate(50),
                'advertisements_commerce' => Advertisement::where('user_id',Auth::user()->id)->where('category_id', 3)->filter($request->all())->paginate(50),

            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Advertisement $advertisementadmin)
    {
        $regions = Region::all();
        
        if ( $advertisementadmin)
        {
            $buildings = Building::where('category_id',$advertisementadmin->category_id)->get();
        }

        else 
        {
            $buildings = Building::all();
        }

        $cities = City::where('region_id' ,$advertisementadmin->region_id)->get();
        $items = Item::where('category_id' , $advertisementadmin->category_id)->get();
        $extras = Extra::where('category_id' , $advertisementadmin->category_id)->where('building_id' , $advertisementadmin->building_id)->get();
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.advertisement.upsert',[
                'advertisement' => $advertisementadmin,
                'regions' =>  $regions,
                'cities' =>  $cities ,
                'buildings' =>  $buildings,
                'items' => $items,
                'extras'=>$extras,
        ]);
        else 
        {
            return view('admin.pages.advertisement.upsert',[
                'advertisement' => $advertisementadmin,
                'regions' =>  $regions,
                'cities' =>  $cities ,
                'buildings' =>  $buildings,
                'items' => $items,
                'extras'=>$extras,
            ]);
        }
    }

    public function status(Request $request)
    {
        return Advertisement::advertisementUpdate($request);
    }

    public function itemFilter(Request $request)
    {
       return Advertisement::itemFilter($request);
    }



    public function modify(AdvertisementRequest $request)
    {
        return Advertisement::upsertInstance($request);
    }

    public function destroy(Advertisement $advertisementadmin)
    {
        return $advertisementadmin->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.advertisement.index',[
            'advertisements_building' => Advertisement::where('category_id', 1)->filter($request->all())->paginate(50),
            'advertisements_vip' => Advertisement::where('category_id', 2)->filter($request->all())->paginate(50),
            'advertisements_commerce' => Advertisement::where('category_id', 3)->filter($request->all())->paginate(50),
        ]);
    }
}
