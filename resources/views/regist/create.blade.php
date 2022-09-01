@extends('base')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="m-sm-4">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="/regist">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input class="form-control form-control-lg" type="text" name="fullname" placeholder="Enter your full name" :value="old('fullname')" required autofocus/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="name" placeholder="Enter your name" :value="old('name')" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Enter your email" :value="old('email')" required/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select mb-3" required>
                        <option selected>Please Select</option>
                        <option>user</option>
                        <option>admin</option>
                        <option>hod</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Enter password" required autocomplete="new-password"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control form-control-lg" type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter password" required/>
                </div>
                <div class="text-center mt-3">
                    {{-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> --}}
                    <button type="submit" class="btn btn-lg btn-primary" value="{{ __('regist') }}">Sign up</button> <br>
                   
    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
