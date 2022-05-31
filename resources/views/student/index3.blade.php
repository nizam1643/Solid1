@extends('student.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD WITH Livewire - SOLID</h2>
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

    @livewire('student')

@endsection
