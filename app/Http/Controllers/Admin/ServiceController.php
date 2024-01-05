<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.service.index',[
                'services' => Service::filter($request->all())->paginate(10),
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
    public function upsert(Service $service)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.service.upsert',[
                'service' => $service,
                'users' => User::where('role_id',USER)->orWhere('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }

    public function services(Request $request)
    {
        return Service::serviceSelect($request);
    }

    public function modify(Request $request)
    {
        return Service::upsertInstance($request);
    }

    public function destroy(Service $service)
    {
        return $service->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.service.index',[
            'services' => Service::filter($request->all())->paginate(10)
        ]);
    }
}
