@extends('user.layout.index')
@section('title', 'Happy Meal Home Page')
@section('content')

@auth

<div class="col-12">
    <div class="col-12 d-flex">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal1.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal2.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal3.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal4.jpg" alt="Image">
    </div>
    <div class="col-12 d-flex flex-row-reverse">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal1.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal2.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal3.jpg" alt="Image">
        <img class="w-100 p-2" src="{{ asset('user_assets')}}/img/meal4.jpg" alt="Image">
    </div>
    
</div>


@endauth

@endsection