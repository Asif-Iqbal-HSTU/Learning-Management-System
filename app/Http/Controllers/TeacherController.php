<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\Department;
use App\Models\User;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function gototeacherSignupPage()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('teachers.teacherSignupPage' , [
            'faculties' => $faculties,
            'departments' => $departments,
            'designations' => ['Lecturer', 'Assistant Professor', 'Associate Professor', 'Professor'],
        ]);
    }

    public function createTeacher(Request $request)
    {
        //dd($request);
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'designation' => 'required',
            'password' => 'required',
        ]);
        try {

            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'password' => $request->password,
                'role_id' => "2",
            ]);

            $teacher = Teacher::create([
                'department_id' => $request->department,
                'faculty_id' => $request->faculty,
                'designation' => $request->designation,
                'user_id' => $user->id,
            ]);

            return redirect()->back()->with('success', "Teacher added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
