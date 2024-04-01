@extends('admin.layout.index')
@section('title', 'Admin Panel')
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
            <a class="btn btn-secondary" href="{{route('admin_logout')}}">Logout</a>
        </div>
    </div>

</nav>
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
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
            <table class="table table-bordered w-95">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>approval_status</th>
                        <th>active_status</th>
                        <th>is_approve</th>
                        <th>is_active</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>@if($user->approval_status == 0) Not Approved @else Approved @endif</td>
                        <td>@if($user->active_status == 0) Deactivate @else Activate @endif</td>
                        <td>

                            <a href="{{ route('admin.approvalstatus',$user->id) }}" class="btn btn-primary">@if($user->approval_status == 1) Reject @else Approve @endif</a>

                        </td>
                        <td>

                            <a href="{{ route('admin.activestatus',$user->id) }}" class="btn btn-secondary">@if($user->active_status == 1) Deactivate @else Activate @endif</a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection