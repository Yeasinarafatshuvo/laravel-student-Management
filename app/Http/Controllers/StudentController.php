<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
   

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        //validate input data

        $request->validate([
            'student_name' => 'required',
            'university' => 'required',
            'student_department' => 'required',
            'admission_semester' => 'required'
        ]);


        //store data to database using eloquent orm

        $student = Student::create([
            'student_name' => $request->input('student_name'),
            'university' => $request->input('university'),
            'student_department' => $request->input('student_department'),
            'admission_semester' => $request->input('admission_semester')
        ]);

        if($student){
            //pass variable and store data to session for success message
            return back()->with('success', 'New student has been successfully added to database');
        }else{
             //pass variable and store data to session for fail message
            return back()->with('fail', 'Something went wrong try again latter');
        }


    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
         //validate input data

         $request->validate([
            'student_name' => 'required',
            'university' => 'required',
            'student_department' => 'required',
            'admission_semester' => 'required'
        ]);

        $student = Student::where('id', '=', $id)->update([
            'student_name' => $request->input('student_name'),
            'university' => $request->input('university'),
            'student_department' => $request->input('student_department'),
            'admission_semester' => $request->input('admission_semester')
        ]);

        if($student){
            //pass variable and store data to session for success message
            return redirect('/admin/dashboard');
        }else{
             //pass variable and store data to session for fail message
            return back()->with('fail', 'Something went wrong try again latter');
        }
         
        


    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/admin/dashboard');

    }
        
}
