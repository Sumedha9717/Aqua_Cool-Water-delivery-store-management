@extends('layouts.app')

@section('title','Thank You For Shoping')

@section('content')

<div class="py-3 pyt-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                @if (session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                    <h2>Aqua Cool</h2>
                    <h4>Thank You for Shopping with Aqua Cool</h4>
                    <a href="{{ url('collections') }}" class="btn btn-danger">SHOP NOW</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
