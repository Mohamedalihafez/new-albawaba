<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.partner.index',[
                'partners' => Partner::filter($request->all())->where('partner_type' , 1)->paginate(10),
                'users' => User::where('role_id',USER)->orWhere('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Partner $partner)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.partner.upsert',[
                'partner' => $partner,
                'users' => User::where('role_id',USER)->orWhere('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }

    public function partners(Request $request)
    {
        return Partner::partnerSelect($request);
    }

    public function modify(PartnerRequest $request)
    {
        return Partner::upsertInstance($request);
    }

    public function destroy(Partner $partner)
    {
        return $partner->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.partner.index',[
            'partners' => Partner::filter($request->all())->where('partner_type' , 1)->paginate(10)
        ]);
    }
}
