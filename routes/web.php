<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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
})->middleware('auth');

Route::get('/form', function () {
    return view('template.form');
});

// Export
Route::get('/student/cetak', [StudentController::class, 'export_pdf']);

Route::resource('/student', StudentController::class)->middleware('auth');
Route::resource('/teacher', TeacherController::class)->middleware('auth');
Route::resource('/schoolclass', SchoolClassController::class)->middleware('auth');
Route::resource('/timetable', TimetableController::class)->middleware('auth');
Route::resource('/course', CourseController::class)->middleware('auth');

//Login - Register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
