@extends('template.layout')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Students Data</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fuga quaerat, aut architecto autem
        aspernatur voluptas tempora id neque vel.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <a href="/student/create" class="btn btn-primary mb-3">Add Student</a>
            <a href="/student/cetak" class="btn btn-warning mb-3">Export Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Number</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->student_number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->class->class_name }}</td>
                                <td>
                                    <a href="/student/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/student/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $student->links() }}
            </div>
        </div>
    </div>
@endsection
