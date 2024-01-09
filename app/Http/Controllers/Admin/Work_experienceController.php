<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Work_experience;
use Illuminate\Http\Request;
use Toastr;
class Work_experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $work_experience = Work_experience::latest()->get();
      return view('admin.pages.work _experience.manage_work_experience',compact('work_experience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.work _experience.create_work_experience');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work_experience = new Work_experience;
        $work_experience->work_experienceName = $request->work_experienceName;
        $work_experience->short_description = $request->short_description;
        $work_experience->work_place = $request->work_place;
        $work_experience->dateFrom_startToend = $request->dateFrom_startToend;
        $save = $work_experience->save();
        if($save){
        Toastr::success('Work Experience create successfully', '', ["positionClass" => "toast-top-center"]);
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
        $work_experience = Work_experience::find($id);
        return view('admin.pages.work _experience.edit_work_experience', compact('work_experience'));

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
         $work_experience = Work_experience::find($id);
         $work_experience->work_experienceName = $request->work_experienceName;
         $work_experience->short_description = $request->short_description;
         $work_experience->work_place = $request->work_place;
         $work_experience->dateFrom_startToend = $request->dateFrom_startToend;
         $save = $work_experience->save();
         if($save){
            Toastr::success('Work Experience update successfully', 'ID'.'  '.$work_experience->id, ["positionClass" => "toast-top-center"]);
         }
         else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
         }
         return redirect()->route('manage_work_exper');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $work_experience = Work_experience::find($id);
         $save = $work_experience->delete();
         if($save){
            Toastr::success('Work_experience Delete successfully', 'ID'.'  '.  $work_experience->id, ["positionClass" => "toast-top-center"]);
         }
         else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
         }
         return redirect()->back();
    }
}
