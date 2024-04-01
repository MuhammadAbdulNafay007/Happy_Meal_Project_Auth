@extends('admin.layout.index')
@section('title', 'Admin Panel Login')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand " href="#">
            <h3 class="text-primary">Happy Meal Admin Panel</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">

            </div>
        </div>
    </div>

</nav>
<div class="container-fluid">

    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <form action="{{route('admin_login.store')}}" method="POST" role="form">
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
                    <div class=" d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class=" text-decoration-none">
                            <h4 class="text-primary">Happy Meal</h4>
                        </a>
                        <h5 class="ms-2 text-danger">Admin Login</h5>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="jhondoe" value="{{ old('username') }}" required>
                        <label for="username">Username<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}" required>
                        <label for="password">Password<span class="text-danger">*</span></label>

                        <button type="submit" class="btn btn-primary mt-4 py-3 w-100 mb-4">Login</button>

                    </div>
            </form>
        </div>
    </div>
</div>

@endsection