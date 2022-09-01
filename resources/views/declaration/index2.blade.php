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
                <th>Status</th>
                <th>Approval</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody><?php $i=1; ?>
            @foreach($declare as $declare)
            <tr>
                <td class="text-center">{{ $i++}}</td>
                <td>{{$declare->userid_func->fullname}}</td>
                <td>{{$declare->declareDate}}</td>
                <td>{{$declare->offerDate}}</td>
                <td>{{$declare->type}}</td>
                <td>{{$declare->description}}</td>
                <td>{{$declare->estimateValue}}</td>
                <td>{{$declare->status}}</td>
                <td>{{$declare->approval}}</td>
                <td>
                    <a href="/declaration/{{$declare->id}}/edit2" class="btn btn-success btn-sm float-right">Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
<script>
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection