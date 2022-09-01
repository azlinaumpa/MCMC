@extends('base')
@section('content')
<div>
<a href="/declaration/create"><button type="button" class="btn btn-success">Create Declaration</button></a>
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
                <th>Declare Date</th>
                <th>Offer Date</th>
                <th>Type</th>
                <th>Description</th>
                <th>Estimate Value</th>
                <th>Action</th>
                <th>Approval</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody><?php $i=1; ?>
            @foreach($declare_user as $declare)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>{{$declare->declareDate}}</td>
                <td>{{$declare->offerDate}}</td>
                <td>{{$declare->type}}</td>
                <td>{{$declare->description}}</td>
                <td>{{$declare->estimateValue}}</td>
                <td>{{$declare->status}}</td>
                <td>{{$declare->approval}}</td>
                <td>
                    <a href="{{ route('declaration.edit', $declare->id) }}" class="btn btn-success btn-sm float-right">Update</a>
                    <form method="POST" action="/declaration/{{$declare->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection