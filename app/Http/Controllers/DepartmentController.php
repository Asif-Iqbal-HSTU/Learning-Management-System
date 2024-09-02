<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    public function gotoAddDepartmentPage()
    {
        $teachers = User::where('role_id', "2")->get();
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('departments.addDepartmentPage',[
            'teachers' => $teachers,
            'faculties' => $faculties,
            'departments' => $departments,
        ]);
    }

    public function createDepartment(Request $request)
    {
        //dd($request);
        $request->validate([
            'title' => 'required',
            'dept_code' => 'required',
            'faculty' => 'required',
            'chairman' => 'required',
        ]);
        try {

            $department = Department::create([
                'title' => $request->title,
                'dept_code' => $request->dept_code,
                'faculty_id' => $request->faculty,
                'user_id' => $request->chairman,
            ]);

            return redirect()->back()->with('success', "Department added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
