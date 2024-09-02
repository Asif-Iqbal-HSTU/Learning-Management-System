<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use App\Http\Middleware\StudentMiddleware;

use App\Http\Controllers\LoginController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DistributionController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/teacher/dashboard',[DashboardController::class,'gotoTeacherDashboard'])->name('gotoTeacherDashboard')->middleware(TeacherMiddleware::class);
Route::get('/student/dashboard',[DashboardController::class,'gotoStudentDashboard'])->name('gotoStudentDashboard')->middleware(StudentMiddleware::class);
Route::get('/admin/dashboard',[DashboardController::class,'gotoAdminDashboard'])->name('gotoAdminDashboard')->middleware(AdminMiddleware::class);

Route::get('/degree',[DegreeController::class,'gotoAddDegreePage'])->name('gotoAddDegreePage')->middleware(AdminMiddleware::class);
Route::post('/degree',[DegreeController::class,'createDegree'])->name('createDegree')->middleware(AdminMiddleware::class);

Route::get('/faculty',[FacultyController::class,'gotoAddFacultyPage'])->name('gotoAddFacultyPage')->middleware(AdminMiddleware::class);
Route::post('/faculty',[FacultyController::class,'createFaculty'])->name('createFaculty')->middleware(AdminMiddleware::class);

Route::get('/department',[DepartmentController::class,'gotoAddDepartmentPage'])->name('gotoAddDepartmentPage')->middleware(AdminMiddleware::class);
Route::post('/department',[DepartmentController::class,'createDepartment'])->name('createDepartment')->middleware(AdminMiddleware::class);

Route::get('/course',[CourseController::class,'gotoAddCoursePage'])->name('gotoAddCoursePage')->middleware(AdminMiddleware::class);
Route::post('/course',[CourseController::class,'createCourse'])->name('createCourse')->middleware(AdminMiddleware::class);

Route::get('/signup/teacher',[TeacherController::class,'gototeacherSignupPage'])->name('gototeacherSignupPage')->middleware(AdminMiddleware::class);
Route::post('/signup/teacher',[TeacherController::class,'createTeacher'])->name('createTeacher')->middleware(AdminMiddleware::class);

Route::get('/signup/student',[StudentController::class,'gotostudentSignupPage'])->name('gotostudentSignupPage')->middleware(AdminMiddleware::class);
Route::post('/signup/student',[StudentController::class,'createStudent'])->name('createStudent')->middleware(AdminMiddleware::class);

//distribution
Route::get('/course/distribution',[DistributionController::class,'gotoDistributeCoursePage'])->name('gotoDistributeCoursePage')->middleware(TeacherMiddleware::class);
Route::post('/course/distribution',[DistributionController::class,'distributeCourse'])->name('distributeCourse')->middleware(TeacherMiddleware::class);
