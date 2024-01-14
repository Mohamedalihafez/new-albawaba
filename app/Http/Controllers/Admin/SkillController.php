<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::latest()->where('user_id', Auth::user()->id)->get();
        
        return view('admin.pages.skill.manage_skill',compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.skill.create_skill');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill;
        $skill->skill_1 = $request->skill_1;
        $skill->skill_1_percentage = $request->skill_1_percentage;
        $skill->skill_2 = $request->skill_2;
        $skill->skill_2_percentage = $request->skill_2_percentage;
        $skill->skill_3 = $request->skill_3;
        $skill->skill_3_percentage = $request->skill_3_percentage;
        $skill->skill_4 = $request->skill_4;
        $skill->skill_4_percentage = $request->skill_4_percentage;
        $skill->skill_5 = $request->skill_5;
        $skill->skill_5_percentage = $request->skill_5_percentage;
        $skill->skill_6 = $request->skill_6;
        $skill->skill_6_percentage = $request->skill_6_percentage;
        $skill->user_id = Auth::user()->id;

        $save =  $skill->save();
        if($save){
            Toastr::success('Skill create successfully', '', ["positionClass" => "toast-top-center"]);
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
         return view('admin.pages.skill.edit_skill',compact('skill'));
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
       $skill = Skill::find($id);
       $skill->skill_1 = $request->skill_1;
       $skill->skill_1_percentage = $request->skill_1_percentage;
       $skill->skill_2 = $request->skill_2;
       $skill->skill_2_percentage = $request->skill_2_percentage;
       $skill->skill_3 = $request->skill_3;
       $skill->skill_3_percentage = $request->skill_3_percentage;
       $skill->skill_4 = $request->skill_4;
       $skill->skill_4_percentage = $request->skill_4_percentage;
       $skill->skill_5 = $request->skill_5;
       $skill->skill_5_percentage = $request->skill_5_percentage;
       $skill->skill_6 = $request->skill_6;
       $skill->skill_6_percentage = $request->skill_6_percentage;
       $skill->user_id = Auth::user()->id;

       $save =  $skill->save();  
       if($save){
            Toastr::success('Skill update successfully', 'ID'.'  '. $skill->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->route('manage_skill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $save = $skill->delete();
        if($save){
            Toastr::success('Skill Delete successfully', 'ID'.'  '.  $skill->id, ["positionClass" => "toast-top-center"]);
        }
        else{
            Toastr::warning('Something is wrong', '', ["positionClass" => "toast-top-center"]);
        }
        return redirect()->back();
    }
}
