@extends('user.layout.index')
@section('title', 'Happy Meal Register Page')
@section('content')

<div class="container-fluid">
    <div class="row h-100 align -items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form action="{{route('user.register.store')}}" method="POST" role="form">
                @csrf
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
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
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="text-decoration-none">
                            <h3 class="text-primary">Happy Meal</h3>
                        </a>
                        <h4 class="text-secondary">Register</h4>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="jhondoe" value="{{ old('username') }}" required>
                        <label for="username">Username<span class="text-danger">*</span></label>
                    </div>

                    <div class="form-floating mb-3">

                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email">Email address<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}" required>
                        <label for="password">Password<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password">
                        <label for="floatingPassword">Confirm Password<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Phone Number" value="{{ old('mobile') }}" required>
                        <label for="floatingtel">Phone Number<span class="text-danger">*</span></label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Register</button>
                    <p class="text-center mb-0">Already have an Account? <a href="{{route('user.login')}}">Login</a></p>
                </div>
            </form>

            @endsection