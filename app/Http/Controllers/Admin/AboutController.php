<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use App\Models\About;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $about = About::latest()->where('user_id', Auth::user()->id)->get();
      return view('admin.pages.about.manage_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.about.create_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new About;
        $about->age = $request->age;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->address = $request->address;
        $about->language = $request->language;
        $about->short_about = $request->short_about;
        $about->user_id = Auth::user()->id;
        $save = $about->save();
        if($save){
            Toastr::success('About create successfully', '', ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $about = About::find($id);
      return view('admin.pages.about.edit_about',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $about = About::find($id);
       $about->age = $request->age;
       $about->email = $request->email;
       $about->phone = $request->phone;
       $about->address = $request->address;
       $about->language = $request->language;
       $about->short_about = $request->short_about;
       $about->user_id = Auth::user()->id;

       $save = $about->save();
       if($save){
            Toastr::success('About update successfully', 'ID'.'  '. $about->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->route('manage_about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        if($about){
            Toastr::success('About dalete successfully', 'ID'.'  '. $about->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->back();
    }
}
