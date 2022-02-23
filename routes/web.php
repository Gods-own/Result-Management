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
use App\Http\Controllers\Users\ViewResultController;
use App\Http\Controllers\Users\ViewStudentController;
use App\Http\Controllers\Users\ViewClassesController;
use App\Http\Controllers\Teacher\RecordTest1Controller;
use App\Http\Controllers\Teacher\RecordTest2Controller;
use App\Http\Controllers\Teacher\RecordExamController;
use App\Http\Controllers\Teacher\RecordResultController;
use App\Http\Controllers\Admin\AddRemarkController;
use App\Http\Controllers\Teacher\AddRemarkController as TeacherRemarkController;


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

Route::post('/pricipal_remark/{student}', [AddRemarkController::class, 'show'])->name('principal_remark');
Route::post('/principal_remark', [AddRemarkController::class, 'store'])->name('store_principal_remark');

Route::post('/teacher_remark/{student}', [TeacherRemarkController::class, 'show'])->name('teacher_remark');
Route::post('/teacher_remark', [TeacherRemarkController::class, 'store'])->name('store_teacher_remark');

Route::get('/teacher/{user}/edit', [TeacherController::class, 'edit'])->name('edit_teacherInfo');
Route::put('/teacher/{user}', [TeacherController::class, 'update'])->name('update_teacherInfo');
Route::delete('/teacher/{user}/delete', [TeacherController::class, 'destroy'])->name('delete_teacherInfo');

Route::get('/student/{user}/edit', [StudentController::class, 'edit'])->name('edit_studentInfo');
Route::put('/student/{user}', [StudentController::class, 'update'])->name('update_studentInfo');
Route::delete('/student/{user}/delete', [StudentController::class, 'destroy'])->name('delete_studentInfo');

Route::get('/teachers_lists', [ViewTeacherController::class, 'index'])->name('view_teachers');

Route::get('/students_lists', [ViewStudentController::class, 'index'])->name('view_students');

Route::post('/result/{student}', [ViewResultController::class, 'show'])->name('view_result');
Route::post('/convert_to_pdf/{student}', [ViewResultController::class, 'pdfConvert'])->name('convert_to_pdf');
Route::post('/convert_to_excel/{student}', [ViewResultController::class, 'excelConvert'])->name('convert_to_excel');

Route::get('/class_lists', [ViewClassesController::class, 'index'])->name('view_classes');
Route::post('/class_lists/{classroom}', [ViewClassesController::class, 'show'])->name('view_classStudents');

Route::get('/teacher_subject', [SubjectTaughtController::class, 'index'])->name('teacher_subject');
Route::post('/teacher_subject', [SubjectTaughtController::class, 'store']);

Route::get('/class_type', [ClassTypeController::class, 'index'])->name('class_type');
Route::post('/class_type', [ClassTypeController::class, 'store']);

Route::get('/record_test1/{subject}/{classroom}', [RecordTest1Controller::class, 'index'])->name('record_test1');
Route::get('/record_test1/{user}/{subject}/{classroom}', [RecordTest1Controller::class, 'show'])->name('test1');
Route::post('/record_test1/{user}/{subject}/{classroom}', [RecordTest1Controller::class, 'store']);

Route::get('/record_test2/{subject}/{classroom}', [RecordTest2Controller::class, 'index'])->name('record_test2');
Route::get('/record_test2/{user}/{subject}/{classroom}', [RecordTest2Controller::class, 'show'])->name('test2');
Route::post('/record_test2/{user}/{subject}/{classroom}', [RecordTest2Controller::class, 'store']);

Route::get('/record_exam/{subject}/{classroom}', [RecordExamController::class, 'index'])->name('record_exam');
Route::get('/record_exam/{user}/{subject}/{classroom}', [RecordExamController::class, 'show'])->name('exam');
Route::post('/record_exam/{user}/{subject}/{classroom}', [RecordExamController::class, 'store']);

Route::get('/record_result/{classroom}/{subject}', [RecordResultController::class, 'index'])->name('record_result');
Route::get('/record_result/{user}/{classroom}/{subject}', [RecordResultController::class, 'show'])->name('result');
Route::post('/record_result/{user}/{classroom}/{subject}', [RecordResultController::class, 'store']);


// Route::get('/dashboard/staff', [TeacherDashboardController::class, 'index'])->name('teacherDashboard');

// Route::get('/dashboard/students', [StudentDashboardController::class, 'index'])->name('studentDashboard');

Route::get('/', function () {
    return view('home');
})->name('home');
