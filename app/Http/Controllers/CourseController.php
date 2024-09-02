<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Course;

class CourseController extends Controller
{
    public function gotoAddCoursePage()
    {        
        $degrees = Degree::all();       //select * from Degree
        return view('courses.addCoursePage' , [
            'degrees' => $degrees,
        ]);
    }

    public function createCourse(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'level' => 'required',
            'semester' => 'required',
            'type' => 'required',
            'degree' => 'required',
            'credit_hour' => 'required',
        ]);
        try {

            $course = Course::create([
                'code' => $request->code,
                'name' => $request->name,
                'level' => $request->level,
                'semester' => $request->semester,
                'type' => $request->type,
                'degree_id' => $request->degree,
                'credit_hour' => $request->credit_hour,
            ]);

            return redirect()->back()->with('success', "Course added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
