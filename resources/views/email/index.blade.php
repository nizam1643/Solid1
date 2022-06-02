@extends('email.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Laravel 8 CRUD - SOLID</h2>
            </div>
            <div class="pull-right">
                <form action="{{ route('email.sendEmail') }}" method="GET">
                    @csrf

                    <div class="input-group">
                        <input type="text" class="form-control" name="sender_name" placeholder="my Name">
                        <input type="email" class="form-control" name="sender_email" placeholder="My Email">
                        <input type="email" class="form-control" name="email_hob" placeholder="Email HOB">
                        <br>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </span>
                    </div>
                    <div>
                        @error('sender_name') <span class="text-danger">{{ $message }}</span>@enderror
                        @error('sender_email') <span class="text-danger">{{ $message }}</span>@enderror
                        @error('email_hob') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
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
            <th>Sender Name</th>
            <th>Sender Email</th>
            <th>Email HOB</th>
            <th>status</th>
        </tr>
        @foreach ($sendEmails as $email)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $email->sender_name }}</td>
            <td>{{ $email->sender_email }}</td>
            <td>{{ $email->email_hob }}</td>
            <td>
                @if ($email->status == 'pending')
                    <button type="button" class="btn btn-danger">Not Approved</button>
                @endif
                @if ($email->status == 'approved')
                    <button type="button" class="btn btn-success">Approved</button>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

@endsection
