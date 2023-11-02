<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //
    public function joinTable(){
       $department = DB::table("departments")
       ->join("courses", "courses.id","=","departments.course_id")
       ->join("teachers","teachers.id","=","departments.teacher_id")
       ->select("departments.id","departments.name","courses.course_name","teachers.teacher_name","departments.description")
       ->get();

       $course = DB::table("courses")->get();
       $teacher = DB::table("teachers")->get();

       return view("index",compact("department", "course","teacher"));
    }

    public function saveDepart(Request $request){

        $depart = new Department();
        $depart->name= $request->department;
        $depart->course_id = $request->course;
        $depart->teacher_id = $request->teacher;
        $depart->description= $request->description;
        $depart->save();
        return redirect()->back()->with("success","Save Success");
    }

    public function editDepart($id,Request $request){
        $depart = Department::where('id', $id)->first();
        $depart->name= $request->department;
        $depart->course_id = $request->course;
        $depart->teacher_id = $request->teacher;
        $depart->description= $request->description;
        $depart->update();
        return redirect()->back()->with("edit","Edit Success");
    }

    public function deleteDepart($id){

        $depart = Department::where("id", $id)->first();
        $depart->delete();
        return redirect()->back()->with("delete","Delete success");
    }
}
