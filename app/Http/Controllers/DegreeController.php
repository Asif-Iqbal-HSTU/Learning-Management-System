<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Degree;

class DegreeController extends Controller
{
    public function gotoAddDegreePage()
    {
        $faculties = Faculty::all();
        $degrees = Degree::all();
        return view('degrees.addDegreePage',[
            'faculties' => $faculties,
            'degrees' => $degrees,
        ]);
    }

    public function createDegree(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'faculty' => 'required',
        ]);
        try {

            $course = Degree::create([
                'title' => $request->title,
                'faculty_id' => $request->faculty,
            ]);

            return redirect()->back()->with('success', "Degree added successfully!");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
