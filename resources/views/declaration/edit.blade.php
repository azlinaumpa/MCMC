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
                <form method="POST" action="/declaration/{{$declare->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Declare Date</label>
                        <input type="date" name="declareDate" class="form-control" placeholder="Input" value="{{$declare->declareDate}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Offer Date</label>
                        <input type="date" name="offerDate" class="form-control" placeholder="Input" value="{{$declare->offerDate}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Types</label>
                        <select name="type" class="form-select mb-3" required>
                            <option hidden selected value="{{$declare->type}}">{{$declare->type}}</option>
                            <option>Asset</option>
                            <option>Gift</option>
                            <option>bankrupcy</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Textarea" required>{{$declare->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimate value</label>
                        <input type="text" name="estimateValue" class="form-control" placeholder="Input" value="{{$declare->estimateValue}}" required>
                    </div>
                    <div class="mb-3">
                        <label>File upload</label>
                        @if($declare->print!=null)
                            <a href="{{ asset('storage/'.$declare->print) }}" target="_blank"><br><br>
                        download</a></td>
                        <input type="file" name="print" class="form-control" name="fail_upload" required>
                        @else
                        <input type="file" name="print" class="form-control" name="fail_upload">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                </div>
                
            </div>


            
        </div>

  
    </div>

</div> 
@endsection
