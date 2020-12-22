@extends('layouts/sidebar')

@section('title')
<title>Updates</title>
@endsection

@section('content')
    <div class="row mx-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card bg-warning">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Profile Information</h5>
                    <form method="POST" action="{{ url('profile') }}">
                        @csrf                           
                        
                        <div class="position-relative form-group">
                            <label class="">Name</label>
                            <input name="name" id="name" value="{{ Auth::user()->name }}" type="text" class="form-control ">
                        </div>
                        
                        <div class="position-relative form-group">
                            <label class="">Email</label>
                            <input name="email" id="email" value="{{ Auth::user()->email }}" type="email" class="form-control">
                        </div>
                        
                        <div class="position-relative form-group">
                            <label class="">Phone Number</label>
                            <input name="phone" id="phone" value="{{ Auth::user()->phone }}" type="number" class="form-control">
                        </div>
                        
                        <div class="position-relative form-group">
                            <label class="">City</label>
                            <input name="city" id="city" value="{{ Auth::user()->city }}" type="text" class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Address</label>
                            <input name="address" id="address" value="{{ Auth::user()->address }}" type="text" class="form-control">
                        </div>

                        <button class="mt-1 btn btn-primary" type="submit">Save</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card bg-warning">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Password</h5>
                    <form method="POST" action="{{ url('profile_password') }}">
                        @csrf                           
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">New Password</label>
                            <input name="password" id="password" value="" type="text" class="form-control ">
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            <button class="mt-1 btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection