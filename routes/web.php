<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
<<<<<<< HEAD
=======
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboards\DashboardController;
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7

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
<<<<<<< HEAD

Route::get('/', function () {
    return view('home');
});
=======
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/dashboard/staff', [TeacherDashboardController::class, 'index'])->name('teacherDashboard');

// Route::get('/dashboard/students', [StudentDashboardController::class, 'index'])->name('studentDashboard');

Route::get('/', function () {
    return view('home');
})->name('home');
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
