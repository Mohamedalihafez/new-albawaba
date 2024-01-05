<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.order.index',[
                'orders' => Order::filter($request->all())->paginate(10),
                
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Order $order)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.order.upsert',[
                'order' => $order,
                'categories'=>Category::get(),
                'users' => User::where('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }



    public function modify(OrderRequest $request)
    {
        return Order::upsertInstance($request);
    }

    public function destroy(Order $order)
    {
        return $order->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.order.index',[
            'orders' => Order::filter($request->all())->paginate(10)
        ]);
    }
}
