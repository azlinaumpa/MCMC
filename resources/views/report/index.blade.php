@extends('base')
@section('content')

<p class="mg-b-20"></p>
<div class="card card-stats col-md-12">

    <!-- Card body -->
    <div class="card-body">    
        <div class="row">
    <table class="table" id="example">
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
            @foreach($report as $report)
            <tr>
                <td class="text-center">{{ $i++}}</td>
                <td>{{$report->userid_func->fullname}}</td>
                <td>{{$report->declareDate}}</td>
                <td>{{$report->offerDate}}</td>
                <td>{{$report->type}}</td>
                <td>{{$report->description}}</td>
                <td>{{$report->estimateValue}}</td>
                <td>{{$report->status}}</td>
                <td>{{$report->approval}}</td>
                <td>
                    <a href="/declaration/{{$report->id}}/edit2" class="btn btn-success btn-sm float-right">Update</a>
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