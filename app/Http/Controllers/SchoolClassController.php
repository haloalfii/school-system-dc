<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('class.class', [
            'title' => 'Class Data',
            'schoolclass' => SchoolClass::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create-class', [
            'title' => 'Add Class',
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
        SchoolClass::create($request->all());

        return redirect('/schoolclass')->with('success', 'New Class Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass, $id)
    {
        return view('class.edit-class', [
            'title' => 'Edit Class',
            'schoolclass' => SchoolClass::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schoolClass = SchoolClass::findOrFail($id);
        $schoolClass->class_name = $request->get('class_name');

        $schoolClass->save();

        return redirect('/schoolclass')->with('success', 'Class Has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass, $id)
    {
        $schoolClass = SchoolClass::destroy($id);
        return redirect('/schoolclass')->with('success', 'Class has been deleted!');
    }
}
