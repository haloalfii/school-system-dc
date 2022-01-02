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
            <form method="POST" action="/teacher">
                @csrf
                <div class="mb-3">
                    <label for="teacher_number" class="form-label">Teacher Number</label>
                    <input type="text"
                        class="form-control @error('teacher_number')
                    is-invalid
                @enderror"
                        id="teacher_number" name="teacher_number" autofocus value="{{ old('teacher_number') }}">

                    @error('teacher_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                        class="form-control @error('name')
                    is-invalid
                @enderror"
                        id="name" name="name" value="{{ old('name') }}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Kelas</label>
                    <select class="form-select form-control" name="course_id">
                        @foreach ($course as $item)
                            @if (old('course_id') == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->course_name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->course_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text"
                        class="form-control @error('address')
                    is-invalid
                @enderror"
                        id="address" name="address" value="{{ old('address') }}">

                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        class="form-control @error('email')
                    is-invalid
                @enderror"
                        id="email" name="email" value="{{ old('email') }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text"
                        class="form-control @error('phone_number')
                    is-invalid
                @enderror"
                        id="phone_number" name="phone_number" value="{{ old('phone_number') }}">

                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Teacher</button>
            </form>
        </div>
    </div>
@endsection
