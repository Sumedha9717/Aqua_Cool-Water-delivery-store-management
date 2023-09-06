@extends('layouts.admin')

@section('content')

   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Branch
                        <a href="{{ url('admin/branch') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('admin/branch/'.$branch->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label >Branch Name</label>
                                <input type="text" name="name" value="{{ $branch->name }}" class="form-control" />
                                @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Slug</label>
                                <input type="text" name="slug" value="{{ $branch->slug }}" class="form-control" />
                                @error('slug')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >District</label>
                                <input type="text" name="district" value="{{ $branch->district }}" class="form-control" />
                                @error('district')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >City</label>
                                <input type="text" name="city" value="{{ $branch->city }}" class="form-control" />
                                @error('city')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Address</label>
                                <input type="text" name="adress" value="{{ $branch->adress }}" class="form-control" />
                                @error('adress')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Email</label>
                                <input type="email" name="email" value="{{ $branch->email }}" class="form-control" />
                                @error('email')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Telephone</label>
                                <input type="text" name="phone" value="{{ $branch->phone }}" class="form-control" />
                                @error('phone')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label >Image</label>
                                <input type="file" name="image" class="form-control" />
                                <br><br><img src="{{ asset('uploads/branch/'.$branch->image) }}" width="200px" height="200px" alt="img" />
                                @error('image')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                               <button type="submit" class="btn btn-success float-end">Update</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
   </div>

@endsection
