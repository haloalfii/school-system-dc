<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', [DashboardController::class, 'index']);

Route::get('/', function () {
    return view('template.index');
});

Route::get('/form', function () {
    return view('template.form');
});

Route::resource('/student', StudentController::class);
Route::resource('/teacher', TeacherController::class);
Route::resource('/schoolclass', SchoolClassController::class);
Route::resource('/timetable', TimetableController::class);
Route::resource('/course', CourseController::class);
