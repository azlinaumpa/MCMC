@extends('base')
@section('content')

<p class="mg-b-20"></p>
<div class="card card-stats col-md-12">

    <!-- Card body -->
    <div class="card-body">    
        <div class="row">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Declare Date</th>
                <th>Offer Date</th>
                <th>Type</th>
                <th>Description</th>
                <th>Estimate Value</th>
                <th>Attachment</th>
                <th>Status</th>
                <th>Approval</th>
            </tr>
        </thead>
        <tbody><?php $i=1; ?>
            @foreach($declare as $declare)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>{{$declare->userid_func->fullname}}</td>
                <td>{{$declare->declareDate}}</td>
                <td>{{$declare->offerDate}}</td>
                <td>{{$declare->type}}</td>
                <td>{{$declare->description}}</td>
                <td>{{$declare->estimateValue}}</td>
                <td><a href="/storage/{{$declare->print}}" target="_blank">download</a></td>
                <td>{{$declare->status}}</td>
                <td>{{$declare->approval}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection