<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/teacher/dashboard',[DashboardController::class,'gotoTeacherDashboard'])->name('gotoTeacherDashboard');
Route::get('/student/dashboard',[DashboardController::class,'gotoStudentDashboard'])->name('gotoStudentDashboard');
Route::get('/admin/dashboard',[DashboardController::class,'gotoAdminDashboard'])->name('gotoAdminDashboard');