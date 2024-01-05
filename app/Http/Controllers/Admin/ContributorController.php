<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\PartnerRequest;
use App\Models\Contributor;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributorController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.contributor.index',[
                'contributors' => Partner::filter($request->all())->where('partner_type' , 2)->paginate(10),
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Partner $contributor)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.contributor.upsert',[
                'contributor' => $contributor,
                'users' => User::where('role_id',USER)->orWhere('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }



    public function modify(PartnerRequest $request)
    {
        return Partner::upsertInstance($request);
    }

    public function destroy(Partner $contributor)
    {
        return $contributor->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.contributor.index',[
            'contributors' => Partner::filter($request->all())->where('partner_type' , 2)->paginate(10)
        ]);
    }
}
