@extends('user.layout.index')
@section('title', 'Happy Meal User Profile Page')
@section('content')

<div class="container-fluid">
    <div class="row profile-body">

        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper ms-5 mt-5">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="text-secondary">Profile Info:</h3>
                        <!-- <div>
                            <span ></span>
                        </div> -->
                    </div>
                    <div class="text-center">
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
                        <p class="text-muted">{{$profileData->username}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{$profileData->email}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Mobile No:</label>
                        <p class="text-muted">{{$profileData->mobile}}</p>
                    </div>
                    </div>
                  
                    <!-- <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Password:</label>
                        <p class="text-muted">{{$profileData->password}}</p>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-6 middle-wrapper ms-5 mt-5">
            <div class="row">
                <div class="card">

                    <div class="mt-2">
                        @if($errors->any())
                        <div class="col-12">
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        </div>
                        @endif

                        @if(session()->has('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                    </div>

                    <div class="card-body">

                        <h6 class="card-title">Update Profile</h6>

                        <form class="forms-sample" action="{{ route('user.profile_access.update', $profileData->id) }}" role="form" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Username<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="jhondoe" value="{{$profileData->username}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{$profileData->email}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{$profileData->password_string}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="floatingtel">Phone Number<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Phone Number" value="{{$profileData->mobile}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>
@endsection