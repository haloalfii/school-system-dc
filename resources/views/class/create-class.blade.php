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
            <form method="POST" action="/schoolclass">
                @csrf
                <div class="mb-3">
                    <label for="class_name" class="form-label">Class Name</label>
                    <input type="text"
                        class="form-control @error('class_name')
                    is-invalid
                @enderror"
                        id="class_name" name="class_name" value="{{ old('class_name') }}">

                    @error('class_name')
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
