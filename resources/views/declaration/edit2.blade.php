@extends('base')

@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Declaration Form</h1>
        <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
            Get more form examples
        </a>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Input</h5>
                </div>
                <form method="POST" action="{{ route('declaration.update', [$declare->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Declare Date</label>
                        <input type="date" name="declareDate" class="form-control" value="{{$declare->declareDate}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Offer Date</label>
                        <input type="date" name="offerDate" class="form-control" value="{{$declare->offerDate}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" name="type" class="form-control" value="{{$declare->type}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" readonly>{{$declare->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimate value</label>
                        <input type="text" name="estimateValue" class="form-control" value="{{$declare->estimateValue}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>File upload</label>
                            <a href="{{ asset('storage/'.$declare->print) }}" target="_blank">download</a></td>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select mb-3" required>
                            <option hidden selected value="{{$declare->status}}">{{$declare->status}}</option>
                            <option>pending</option>
                            <option>reviewed</option>
                            <option>completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Approval</label>
                        <select name="approval" class="form-select mb-3" required>
                            <option hidden selected value="{{$declare->approval}}">{{$declare->approval}}</option>
                            <option>approved</option>
                            <option>rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                </div>
                
            </div>


            
        </div>

  
    </div>

</div> 
@endsection
