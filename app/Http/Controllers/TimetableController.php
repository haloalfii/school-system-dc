<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'Admin') {
            return view('timetable.timetable', [
                'timetable' => Timetable::orderBy('day')->paginate(5),
                'title' => 'Timetable'
            ]);
        } else if (auth()->user()->role == 'Student') {
            return view('timetable.timetable', [
                'timetable' => Timetable::join('school_classes', 'school_classes.id', '=', 'timetables.school_class_id')
                    ->where('school_classes.class_name', auth()->user()->school_class)->paginate(5),
                'title' => 'Timetable Student'
            ]);
        } else {
            return view('timetable.timetable', [
                'timetable' => Timetable::orderBy('day')->paginate(5),
                'title' => 'Timetable Teacher'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timetable.create-timetable', [
            'title' => 'Add Timetable',
            'class' => SchoolClass::all(),
            'teacher' => Teacher::all()
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
        Timetable::create($request->all());

        return redirect('/timetable')->with('success', 'New Timetable Has ben added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        return view('timetable.edit-timetable', [
            'title' => 'Edit Timetable',
            'timetable' => $timetable,
            'class' => SchoolClass::all(),
            'teacher' => Teacher::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        Timetable::destroy($timetable->id);
        return redirect('/timetable')->with('success', 'Timetable has been deleted!');
    }
}
