@extends('template.layout')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est fuga quaerat, aut architecto autem
        aspernatur voluptas tempora id neque vel.</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <a href="/schoolclass/create" class="btn btn-primary mb-3">Add Class</a>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schoolclass as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td>
                                    <a href="/schoolclass/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/schoolclass/{{ $item->id }}" method="POST" class="d-inline">
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
                {{ $schoolclass->links() }}
            </div>
        </div>
    </div>
@endsection
