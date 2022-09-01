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
                <form method="POST" action="/declaration" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Declare Date</label>
                        <input type="date" name="declareDate" class="form-control" placeholder="Input" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Offer Date</label>
                        <input type="date" name="offerDate" class="form-control" placeholder="Input" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Types</label>
                        <select name="type" class="form-select mb-3" required>
                            <option selected>Please Select</option>
                            <option>Asset</option>
                            <option>Gift</option>
                            <option>bankrupcy</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Textarea" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimate value</label>
                        <input type="text" name="estimateValue" class="form-control" placeholder="Input" required>
                    </div>
                    <div class="mb-3">
                        <label>File upload</label>
                        {{-- @if($declare->print!=null)
                            <a href="/storage/{{$declare->print}}" target="_blank"><br><br>
                        <img src="/storage/{{$declare->print}}" style="width:50px"></a></td>
                        @else --}}
                        <input type="file" name="print" class="form-control" name="print">
                        {{-- @endif --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                </div>
                
            </div>


            
        </div>

  
    </div>

</div> 
@endsection
