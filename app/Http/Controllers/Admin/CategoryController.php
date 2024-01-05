<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.category.index',[
                'categories' => Category::filter($request->all())->paginate(10),
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Category $category)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.category.upsert',[
                'category' => $category,
                'users' => User::where('role_id',SUPERADMIN)->get(),
            ]);
        else 
            abort(404);
    }


    public function modify(CategoryRequest $request)
    {
        return Category::upsertInstance($request);
    }

    public function destroy(Category $category)
    {
        return $category->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.category.index',[
            'categories' => Category::filter($request->all())->paginate(10)
        ]);
    }
}
