<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\AddTeacherController;
use App\Http\Controllers\Auth\AddStudentController;
use App\Http\Controllers\AddSubjectController;
use App\Http\Controllers\AddClassController;
use App\Http\Controllers\Dashboards\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/add_teacher', [AddTeacherController::class, 'index'])->name('add_teacher');
Route::post('/add_teacher', [AddTeacherController::class, 'store']);

Route::get('/add_student', [AddStudentController::class, 'index'])->name('add_student');
Route::post('/add_student', [AddStudentController::class, 'store']);

Route::get('/add_class', [AddClassController::class, 'index'])->name('add_class');
Route::post('/add_class', [AddClassController::class, 'store']);

Route::get('/add_subject', [AddSubjectController::class, 'index'])->name('add_subject');
Route::post('/add_subject', [AddSubjectController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// Route::get('/dashboard/staff', [TeacherDashboardController::class, 'index'])->name('teacherDashboard');

// Route::get('/dashboard/students', [StudentDashboardController::class, 'index'])->name('studentDashboard');

Route::get('/', function () {
    return view('home');
})->name('home');
