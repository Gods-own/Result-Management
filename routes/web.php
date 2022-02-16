<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\AddTeacherController;
use App\Http\Controllers\Auth\AddStudentController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectTaughtController;
use App\Http\Controllers\Admin\ClassTypeController;
use App\Http\Controllers\Dashboards\DashboardController;
use App\Http\Controllers\Dashboards\AdminDashboardController;
use App\Http\Controllers\Dashboards\TeacherDashboardController;
use App\Http\Controllers\Dashboards\StudentDashboardController;
use App\Http\Controllers\Users\ViewTeacherController;
use App\Http\Controllers\Users\ViewStudentController;
use App\Http\Controllers\Teacher\RecordTest1Controller;


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

Route::get('/add_class', [ClassController::class, 'index'])->name('add_class');
Route::post('/add_class', [ClassController::class, 'store']);
Route::get('/class_room/{class_room}/edit', [ClassController::class, 'edit'])->name('edit_class');
Route::put('/class_room/{class_room}', [ClassController::class, 'update'])->name('update_class');

Route::get('/add_subject', [SubjectController::class, 'index'])->name('add_subject');
Route::post('/add_subject', [SubjectController::class, 'store']);
Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('edit_subject');
Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('update_subject');

Route::get('/add_session', [SessionController::class, 'index'])->name('add_session');
Route::post('/add_session', [SessionController::class, 'store']);
Route::get('/session/{session}/edit', [SessionController::class, 'edit'])->name('edit_session');
Route::put('/session/{session}', [SessionController::class, 'update'])->name('update_session');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->name('admin_dashboard');

Route::get('/dashboard/teacher', [TeacherDashboardController::class, 'index'])->name('teacher_dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/teacher/{user}/edit', [TeacherController::class, 'edit'])->name('edit_teacherInfo');
Route::put('/teacher/{user}', [TeacherController::class, 'update'])->name('update_teacherInfo');
Route::delete('/teacher/{user}/delete', [TeacherController::class, 'destroy'])->name('delete_teacherInfo');

Route::get('/student/{user}/edit', [StudentController::class, 'edit'])->name('edit_studentInfo');
Route::put('/student/{user}', [StudentController::class, 'update'])->name('update_studentInfo');
Route::delete('/student/{user}/delete', [StudentController::class, 'destroy'])->name('delete_studentInfo');

Route::get('/teachers_lists', [ViewTeacherController::class, 'index'])->name('view_teachers');
Route::get('/students_lists', [ViewStudentController::class, 'index'])->name('view_students');

Route::get('/teacher_subject', [SubjectTaughtController::class, 'index'])->name('teacher_subject');
Route::post('/teacher_subject', [SubjectTaughtController::class, 'store']);

Route::get('/class_type', [ClassTypeController::class, 'index'])->name('class_type');
Route::post('/class_type', [ClassTypeController::class, 'store']);

Route::get('/record_test1/{subject}', [RecordTest1Controller::class, 'index'])->name('record_test1');
Route::get('/record_test1/{user}/{subject}', [RecordTest1Controller::class, 'show'])->name('test1');


// Route::get('/dashboard/staff', [TeacherDashboardController::class, 'index'])->name('teacherDashboard');

// Route::get('/dashboard/students', [StudentDashboardController::class, 'index'])->name('studentDashboard');

Route::get('/', function () {
    return view('home');
})->name('home');
