<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Degree;
use App\Models\Department;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;

class StudentController extends Controller
{
    public function gotostudentSignupPage()
    {
        $degrees = Degree::all();
        return view('students.studentSignupPage' , [
            'degrees' => $degrees,
        ]);
    }

    public function createStudent(Request $request)
    {
        //dd($request);
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'degree' => 'required',
            'session' => 'required',
            'level' => 'required',
            'semester' => 'required',
            's_id' => 'required',
            'password' => 'required',
        ]);
        try {
            
            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'password' => $request->password,
                'role_id' => "3",
            ]);

            $teacher = Student::create([                
                's_id' => $request->s_id,
                'degree_id' => $request->degree,
                'session' => $request->session,
                'level' => $request->level,
                'semester' => $request->semester,
                'user_id' => $user->id,
            ]);

            return redirect()->back()->with('success', "Student added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
