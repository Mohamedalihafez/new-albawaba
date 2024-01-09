<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use Image;
use App\Models\Reference;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reference = Reference::latest()->get();
        return view('admin.pages.Reference.manage_reference',compact('reference'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.Reference.create_reference');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference = new Reference;
        $reference->name = $request->name;
        $reference->short_description = $request->short_description;
        $reference->occupation = $request->occupation;
        if($request->hasfile('image'))
        {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        $destinationPath = $file->move(public_path('assets/frontend/images/Reference/'), $image_name);
        // $destinationPath = public_path('assets/frontend/images/Reference/');
        // $Image_resize = Image::make($file)->resize(150,150)->save($destinationPath.$image_name);
        }
        $reference->image =  $image_name;
        $save = $reference->save();
        if($save){
            Toastr::success('Reference create successfully', '', ["positionClass" => "toast-top-center"]);
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
        $reference = Reference::find($id);
        return view('admin.pages.Reference.edit_reference',compact('reference'));
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
        $reference = Reference::find($id);
        $reference->name = $request->name;
        $reference->short_description = $request->short_description;
        $reference->occupation = $request->occupation;
        if($request->hasfile('image'))
        {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        // delete old post image
        $image_delete = Reference::where("image", $reference->image);
        if($image_delete)
         {
          unlink("assets/frontend/images/Reference/".$reference->image);
          
        }
        $destinationPath = $file->move(public_path('assets/frontend/images/Reference/'), $image_name);
        // $destinationPath = public_path('assets/frontend/images/Reference/');
        // $Image_resize = Image::make($file)->resize(150,150)->save($destinationPath.$image_name);
        }
        else{
        $image_name = $reference->image;
        }
        $reference->image =  $image_name;
        $save = $reference->save();
        if($save){
            Toastr::success('Reference update successfully', 'ID'.'  '.$reference->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->route('manage_reference');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::find($id);
        unlink("assets/frontend/images/Reference/".$reference->image);
        $save = $reference->delete();
        if($save){
            Toastr::success('Reference delete successfully', 'ID'.'  '.$reference->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->back();
    }
}
