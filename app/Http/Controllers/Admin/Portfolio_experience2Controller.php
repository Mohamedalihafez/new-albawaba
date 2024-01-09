<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use Image;
use App\Models\Portfolio_experience2;
class Portfolio_experience2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $port_exper2 = Portfolio_experience2::latest()->get();
       return view('admin.pages.portfolio.portfolio_experience2.manage_port_exper2',compact('port_exper2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.portfolio.portfolio_experience2.create_pro_exp2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $port_ex2 = new Portfolio_experience2;
      $port_ex2->project_name = $request->project_name;
      $port_ex2->experience_name = $request->experience_name;
      if($request->hasfile('picture'))
        {
        $file = $request->file('picture');
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        $destinationPath = $file->move(public_path('assets/frontend/images/Portfolio/port_exper2/'),$image_name);
        // $destinationPath = public_path('assets/frontend/images/Portfolio/port_exper2/');
        // $Image_resize = Image::make($file)->resize(600,450)->save($destinationPath.$image_name);
        }
      $port_ex2->picture =  $image_name;
      $save = $port_ex2->save();
      if($save){
            Toastr::success('portfolio_experience2 create successfully', '', ["positionClass" => "toast-top-center"]);
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
       $port_exper2 = Portfolio_experience2::find($id);
       return view('admin.pages.portfolio.portfolio_experience2.edit_port_exper2',compact('port_exper2'));
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
      $port_ex2 = Portfolio_experience2::find($id);
      $port_ex2->project_name = $request->project_name;
      $port_ex2->experience_name = $request->experience_name;
      if($request->hasfile('picture'))
        {
        $file = $request->file('picture');
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        // delete old post image
        $image_delete = Portfolio_experience2::where("picture", $port_ex2->picture);
        if($image_delete)
         {
          unlink("assets/frontend/images/Portfolio/port_exper2/".$port_ex2->picture);
        }
        $destinationPath = $file->move(public_path('assets/frontend/images/Portfolio/port_exper2/'),$image_name);
        // $destinationPath = public_path('/assets/frontend/images/Portfolio/port_exper2/');
        // $Image_resize = Image::make($file)->resize(600,450)->save($destinationPath.$image_name);
        }
      else{
        $image_name = $port_ex2->picture;
      }
      $port_ex2->picture =  $image_name;
      $save = $port_ex2->save();
      if($save){
            Toastr::success('portfolio_experience2 update successfully', 'ID'.'  '.$port_ex2->id, ["positionClass" => "toast-top-center"]);
        }
      else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
      return redirect()->route('manage_port_exp2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port_ex2 = Portfolio_experience2::find($id);
        unlink("assets/frontend/images/Portfolio/port_exper2/".$port_ex2->picture);
        $port_ex2->delete();
        if($port_ex2){
            Toastr::success('portfolio_experience1 dalete successfully', 'ID'.'  '.$port_ex2->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->back();
    }
}
