@extends('layouts.app')
@section('title','Login')

@section('content')
    <form class="border border-2 rounded-3 shadow-lg">
        <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top">
        <div class="offset-1 col-10 mt-5">
            <input type="text" class="form-control border border-dark" placeholder="Email..." id="email" name="email">
        </div>
        <div class="offset-1 col-10 mt-4">
            <input type="password" class="form-control border border-dark" placeholder="Password..." id="pass" name="pass">
            <span class="text-danger"></span>
        </div>
        <div class="offset-8 col-3 mt-4 mb-5">
            <button type="submit" class="btn btn-primary rounded-pill">Ingresar</button>
        </div>
    </form>
@endsection