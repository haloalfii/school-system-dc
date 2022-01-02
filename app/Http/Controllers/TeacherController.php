<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.teacher', [
            'title' => 'Teacher Data',
            'teachers' => Teacher::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create-teacher', [
            'title' => 'Add Teacher',
            'course' => Course::all()
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
            'teacher_number' => 'required|max:255',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|unique:teachers|email:dns',
            'phone_number' => 'required|max:255',
            'course_id' => 'required',
        ]);

        // ddd($validatedData);

        Teacher::create($validatedData);

        return redirect('/teacher')->with('success', 'New Teacher Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit-teacher', [
            'title' => 'Edit Teacher',
            'teacher' => $teacher,
            'course' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'teacher_number' => 'required|max:255',
            'name' => 'required|max:255',
            'course_id' => 'required',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ];

        if ($request->email != $teacher->email) {
            $rules['email'] = 'required|unique:teachers|email:dns';
        }

        $validatedData = $request->validate($rules);

        Teacher::where('id', $teacher->id)->update($validatedData);

        return redirect('/teacher')->with('success', 'Teacher Has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect('/teacher')->with('success', 'Teacher has been deleted!');
    }
}
