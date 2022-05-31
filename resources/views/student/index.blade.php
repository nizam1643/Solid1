@extends('student.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD - SOLID</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->studentID }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <form action="{{ route('student.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('student.show',$student->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
