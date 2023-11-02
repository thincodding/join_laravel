<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //

    public function index(){
        $teachers = Teacher::all();
        return view("teacher", compact("teachers"));
    }

    public function saveTeacher(Request $request){
        $teacher = new Teacher();
        $teacher->teacher_name = $request->teacher;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();

        return redirect()->back()->with("success","Save Successfull");

    }

    public function deleteTeacher($id){
        $teacher = Teacher::where("id", $id)->first();
        $teacher->delete();
        return redirect()->back()->with("delete","Delete Successfull");
    }

    public function updateTeacher($id, Request $request){
        $teacher = Teacher::where("id", $id)->first();
        $teacher->teacher_name = $request->teacher;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->update();
        return redirect()->back()->with("edit","Edit SuccessFull");
    }
}


