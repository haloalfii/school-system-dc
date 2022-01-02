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
            <form method="POST" action="/course">
                @csrf
                <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name</label>
                    <input type="text"
                        class="form-control @error('course_name')
                    is-invalid
                @enderror"
                        id="course_name" name="course_name" value="{{ old('course_name') }}">

                    @error('course_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Class</button>
            </form>
        </div>
    </div>
@endsection
