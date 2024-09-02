<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\User;

class FacultyController extends Controller
{
    public function gotoAddFacultyPage()
    {
        $teachers = User::where('role_id', "2")->get();
        $faculties = Faculty::all();
        return view('faculties.addFacultyPage',[
            'teachers' => $teachers,
            'faculties' => $faculties,
        ]);
    }

    public function createFaculty(Request $request)
    {
        //dd($request);
        $request->validate([
            'title' => 'required',
            'dean' => 'required',
        ]);
        try {

            $course = Faculty::create([
                'title' => $request->title,
                'faculty_code' => $request->faculty,
                'user_id' => $request->dean,
            ]);

            return redirect()->back()->with('success', "Faculty added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

