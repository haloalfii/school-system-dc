@extends('template.layout')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fuga quaerat, aut architecto autem
        aspernatur voluptas tempora id neque vel.</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/timetable/{{ $timetable->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="day" class="form-label">Day</label>
                    <select class="form-select form-control" name="day">
                        @if (old('day', $timetable->day) == 'Monday')
                            <option value="Monday" selected>Monday</option>
                        @elseif (old('day', $timetable->day) == 'Tuesday')
                            <option value="Tuesday">Tuesday</option>
                        @elseif (old('day', $timetable->day) == 'Wednesday')
                            <option value="Wednesday">Wednesday</option>
                        @elseif (old('day', $timetable->day) == 'Thursday')
                            <option value="Thursday">Thursday</option>
                        @elseif (old('day', $timetable->day) == 'Friday')
                            <option value="Friday">Friday</option>
                        @elseif (old('day', $timetable->day) == 'Saturday')
                            <option value="Saturday">Saturday</option>
                        @else
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="session" class="form-label">Session</label>
                    <select class="form-select form-control" name="session">
                        @if (old('session', $timetable->session) == '1, 07.00 - 08.40')
                            <option value="1, 07.00 - 08.40" selected>1, 07.00 - 08.40</option>
                        @elseif (old('session', $timetable->session) == '2, 08.50 - 10.40')
                            <option value="2, 08.50 - 10.40">2, 08.50 - 10.40</option>
                        @elseif (old('session', $timetable->session) == '3, 10.50 - 12.20')
                            <option value="3, 10.50 - 12.20">3, 10.50 - 12.20</option>
                        @else
                            <option value="1, 07.00 - 08.40">1, 07.00 - 08.40</option>
                            <option value="2, 08.50 - 10.40">2, 08.50 - 10.40</option>
                            <option value="3, 10.50 - 12.20">3, 10.50 - 12.20</option>
                        @endif
                    </select>
                </div>

                <div class="mb-3">
                    <label for="school_class_id" class="form-label">Kelas</label>
                    <select class="form-select form-control" name="school_class_id">
                        @foreach ($class as $item)
                            @if (old('school_class_id', $timetable->school_class_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->class_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Kelas</label>
                    <select class="form-select form-control" name="teacher_id">
                        @foreach ($teacher as $item)
                            @if (old('teacher_id', $timetable->teacher_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }} -
                                    {{ $item->course->course_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }} -
                                    {{ $item->course->course_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Timetable</button>
            </form>
        </div>
    </div>
@endsection
