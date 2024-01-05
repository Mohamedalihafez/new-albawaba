<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExtraRequest;
use App\Models\Building;
use App\Models\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtraController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.vip.index',[
                'extras' => Extra::filter($request->all())->where('category_id', 2)->paginate(10),
            ]);
        else 
            abort(404);
        
    }

    public function extra(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.extra.index',[
            'extras' => Extra::filter($request->all())->where('category_id',3)->paginate(10),
            ]);
        else 
            abort(404);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Extra $vip)
    {
        $categories = Building::where('category_id', 2)->get();
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.vip.upsert',[
                'extra' => $vip,
                'categories'=> $categories
            ]);
        else 
            abort(404);
    }

    public function upsertExtra(Extra $extra)
    {
        $categories = Building::where('category_id', 3)->get();
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.extra.upsert',[
                'extra' => $extra,
                'categories'=> $categories
            ]);
        else 
            abort(404);
    }

    public function extras(Request $request)
    {
        return Extra::extraSelect($request);
    }

    public function modify(ExtraRequest $request)
    {
        return Extra::upsertInstance($request);
    }

    public function fetchCategory(Request $request)
    {
       return Extra::fetchCategory($request);
    }

    public function destroy(Extra $vip)
    {
        return $vip->deleteInstance();
    }

    public function filterExtra(Request $request)
    {
        return view('admin.pages.extra.index',[
            'extras' => Extra::filter($request->all())->where('category_id', 3)->paginate(10)
        ]);
    }

    public function filter(Request $request)
    {
        return view('admin.pages.vip.index',[
            'extras' => Extra::filter($request->all())->where('category_id', 2)->paginate(10)
        ]);
    }
}
