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
       ->select("departments.name","courses.course_name","teachers.teacher_name","departments.description")
       ->get();

       $course = DB::table("courses")->get();
       $teacher = DB::table("teachers")->get();

       return view("index",compact("department", "course","teacher"));
    }
}
