@extends('base')
@section('content')
<div>
<a href="/regist/create"><button type="button" class="btn btn-success">Create New User</button></a>
</div>
<p class="mg-b-20"></p>
<div class="card card-stats col-md-12">

    <!-- Card body -->
    <div class="card-body">    
        <div class="row">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                {{-- <th>Description</th>
                <th>Estimate Value</th> --}}
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody><?php $i=1; ?>
            @foreach($user as $user)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>{{$user->fullname}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                {{-- <td>
                    <a href="{{ route('declaration.edit', $declare->id) }}" class="btn btn-success btn-sm float-right">Update</a>
                    <form method="POST" action="/declaration/{{$declare->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection