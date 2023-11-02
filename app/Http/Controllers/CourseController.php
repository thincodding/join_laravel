<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(){

        $course = Course::all();
        return view('course', compact('course'));
    }

    public function InsertCourse(Request $request){
        $course = new Course();
        $course->course_name = $request->course;
        $course->remark = $request->remark;
        $course->save();
        return redirect()->back()->with('success','Save successfully');
    }

    public function deleteCourse($id){
        $course = Course::where('id', $id)->first();
        $course->delete();
        return redirect()->back()->with('delelete','Delete Sucessfully!');
    }

    public function updateCourse($id, Request $reques){
        $course = Course::where('id', $id)->first();
        $course->course_name = $reques->course;
        $course->remark = $reques->remark;
        $course->update();
        return redirect()->back()->with('update','Edit Successfull');
    }


}
