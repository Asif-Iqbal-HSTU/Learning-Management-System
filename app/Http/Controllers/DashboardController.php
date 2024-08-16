<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function gotoTeacherDashboard(){
        return view('teachers.teacherDashboard');
    }

    public function gotoAdminDashboard(){
        return view('admins.adminDashboard');
    }
    
}
