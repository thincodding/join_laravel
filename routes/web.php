<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DetartmentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', [DepartmentController::class,'joinTable']);
Route::post('/', [DepartmentController::class,'saveDepart'])->name("saveDepart");
//---------------update depart---------------
Route::post('/update/{id}', [DepartmentController::class,'editDepart'])->name('editDepart');
//---------------delete depart---------------
Route::get('delete/{id}', [DepartmentController::class,'deleteDepart'])->name('deleteDepart');
//---------------Course----------------------

Route::get("/course", [CourseController::class,"index"])->name('course');
Route::post('/insertCourse', [CourseController::class,'InsertCourse'])->name('InsertCourse');
Route::get("/deletecourse/{id}", [CourseController::class,"deleteCourse"])->name("deleteCourse");
Route::post("/updatecourse/{id}", [CourseController::class,"updateCourse"])->name("updateCourse");

//---------------Teacher--------------------

Route::get('/teacher',[TeacherController::class,'index'])->name('teacher');
Route::post('/teacher',[TeacherController::class,'saveTeacher'])->name('saveTeacher');
Route::get('/deleteteacher/{id}', [TeacherController::class,'deleteTeacher'])->name('deleteTeacher');
Route::post("/updateTeacher/{id}", [TeacherController::class,"updateTeacher"])->name("updateTeacher");
