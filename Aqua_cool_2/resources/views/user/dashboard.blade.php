@extends('layouts.user')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
        <h3 class="alert alert-success">{{ session('message') }}</h3>
        @endif

      {{-- <div class="d-flex justify-content-between flex-wrap"> --}}
            <div class="d-flex align-items-end flex-wrap">
            <div class="mr-md-3 mr-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics details</p>
            </div>
            <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">Analytics</p>
            </div>
          </div>
          <hr>
        {{-- </div> --}}
            {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
            <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                <i class="mdi mdi-download text-muted"></i>
            </button>
            <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                <i class="mdi mdi-clock-outline text-muted"></i>
            </button>
            <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                <i class="mdi mdi-plus text-muted"></i>
            </button>
            <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
            </div> --}}

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total Orders</label>
                        <h4>{{ $totalOrder }}</h4>
                        <a href="{{ url('/orders') }}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label>Total Customers</label>
                        <h4>{{ $totalUser }}</h4>
                        {{-- <a href="#" class="text-white">View</a> --}}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Total Products</label>
                        <h4>{{ $totalProducts }}</h4>
                        {{-- <a href="#" class="text-white">View</a> --}}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total Branches</label>
                        <h4>{{ $totalBranch }}</h4>
                        <a href="{{ url('/user/branch') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>

      </div>
    </div>
  </div>

@endsection
