<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.item.index',[
                'items' => Item::filter($request->all())->paginate(10),
                
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Item $item)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.item.upsert',[
                'item' => $item,
                'categories'=>Category::get(),
                'users' => User::where('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }

    public function items(Request $request)
    {
        return Item::itemSelect($request);
    }

    public function modify(ItemRequest $request)
    {
        return Item::upsertInstance($request);
    }

    public function destroy(Item $item)
    {
        return $item->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.item.index',[
            'items' => Item::filter($request->all())->paginate(10)
        ]);
    }
}
