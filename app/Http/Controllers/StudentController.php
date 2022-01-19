<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.student', [
            'student' => Student::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create-student', [
            'class' => SchoolClass::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_number' => 'required|max:255',
            'name' => 'required|max:255',
            'school_class_id' => 'required',
            'address' => 'required|max:255',
            'email' => 'required|unique:students|email:dns',
            'phone_number' => 'required|max:255',
        ]);

        // ddd($validatedData);

        Student::create($validatedData);

        return redirect('/student')->with('success', 'New Student Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit-student', [
            'student' => $student,
            'class' => SchoolClass::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'student_number' => 'required|max:255',
            'name' => 'required|max:255',
            'school_class_id' => 'required',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ];

        if ($request->email != $student->email) {
            $rules['email'] = 'required|unique:students|email:dns';
        }

        $validatedData = $request->validate($rules);

        student::where('id', $student->id)->update($validatedData);

        return redirect('/student')->with('success', 'student Has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/student')->with('success', 'Student has been deleted!');
    }

    public function export_pdf()
    {
        $student = Student::all();

        $pdf = PDF::loadview('student.export', ['student' => $student]);
        return $pdf->download('Student-Data.pdf');
    }
}
