<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Toastr;
use Image;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $slider = Slider::latest()->where('user_id', Auth::user()->id)->get();
      return view('admin.pages.slider.manage_slider',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
 
        $slider = new Slider();
        $slider->full_name = $request->full_name;
        $slider->experience = $request->experience;
        $slider->user_id = Auth::user()->id;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/frontend/images/profile/'), $image_name);
              }
        $slider->image = $image_name;

        if($request->hasfile('slider'))
        {
            $file = $request->file('slider');
            $extention = $file->getClientOriginalExtension();
            $slider_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/frontend/images/slider/'), $slider_name);
        }
        $slider->slider = $slider_name;

        if($request->file('cv'))
        {
            $file = $request->file('cv'); //Get Image Name;
            $extention = $file->getClientOriginalExtension();
            // $image_get_name = $request->cv->getClientOriginalName();
            $cv_name = time().'.'.$extention;
            $destinationPath =$file->move(public_path('assets/frontend/images/cv/').$cv_name) ;
            
            $slider->cv = $cv_name;
        }
        $save=$slider->save();

        if($save){
            Toastr::success('slider create successfully', '', ["positionClass" => "toast-top-center"]);
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
        $slider = Slider::find($id);

        return view('admin.pages.slider.edit_slider',compact('slider'));
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
        $slider = Slider::find($id);
        $slider->full_name = $request->full_name;
        $slider->experience = $request->experience;
        $slider->user_id = Auth::user()->id;

        if($request->hasfile('image'))
        {
        $file = $request->file('image');
         // delete old post image
        $image_delete = Slider::where("image",$slider->image);
        if($image_delete)
         {
          unlink("assets/frontend/images/profile/".$slider->image);  
        }
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        $destinationPath = $file->move(public_path('assets/frontend/images/profile/'),$image_name);
      
        }
        else{
           $image_name=$slider->image ;  
        }
        $slider->image = $image_name;

        if($request->hasfile('slider'))
        {
        $file = $request->file('slider');
        // delete old post image
        $image_delete = Slider::where("slider",$slider->slider);
        if($image_delete)
         {
          unlink("assets/frontend/images/slider/".$slider->slider);  
        }
        $extention = $file->getClientOriginalExtension();
        $slider_name = time().'.'.$extention;
        $destinationPath = $file->move(public_path('assets/frontend/images/slider/'), $slider_name);
        }
        else{
           $slider_name = $slider->slider;
        }
        $slider->slider = $slider_name;

        if($request->file('cv'))
        {
        $file = $request->file('cv'); //Get Image Name;
          //delete old post Cv
        $image_delete = Slider::where("cv",$slider->cv);
        if($image_delete)
         {
           Storage::deleteDirectory('assets/frontend/images/cv/'.$slider->cv);
           }
        $extention = $file->getClientOriginalExtension();
        // $image_get_name = $request->cv->getClientOriginalName();
        $cv_name = time().'.'.$extention;
        $destinationPath =$file->move(public_path('assets/frontend/images/cv/').$cv_name) ;

        }
        else{
            $cv_name = $slider->cv;
        }
        $slider->cv = $cv_name;
        $save=$slider->save();
        if($save){
            Toastr::success('Slider update successfully', 'ID'.'  '. $slider->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->route('manage_slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $slider = Slider::find($id);
         unlink("assets/frontend/images/slider/".$slider->slider);
         unlink("assets/frontend/images/profile/".$slider->image);
         Storage::deleteDirectory("assets/frontend/images/cv/".$slider->cv);
         $save = $slider->delete();
         if($save){
            Toastr::success('Slider delete successfully', 'ID'.'  '. $slider->id, ["positionClass" => "toast-top-center"]);
         }
         else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
         }
         return redirect()->back();
    }
}
