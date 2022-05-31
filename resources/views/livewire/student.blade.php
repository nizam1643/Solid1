<div>

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th colspan="5">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlSName" placeholder="Search" wire:model="search">
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Stduent ID</th>
                <th>Email</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr>
                <td>{{ ($datas ->currentpage()-1) * $datas ->perpage() + $loop->index + 1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->studentID }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    <form action="{{ route('student.destroy',$data->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('student.show',$data->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('student.edit',$data->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $datas->links() }}
    </div>
</div>
