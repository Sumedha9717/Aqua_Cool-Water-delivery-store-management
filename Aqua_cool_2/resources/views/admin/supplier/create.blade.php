@extends('layouts.admin')

@section('content')

   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Supplier
                        <a href="{{ url('admin/supplier') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('admin/supplier') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label >Supplier Name</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Slug</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >City</label>
                                <input type="text" name="city" class="form-control" />
                                @error('city')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Address</label>
                                <input type="text" name="adress" class="form-control" />
                                @error('adress')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Email</label>
                                <input type="email" name="email" class="form-control" />
                                @error('email')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Telephone</label>
                                <input type="text" name="phone" class="form-control" />
                                @error('phone')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label >Description</label>
                                <textarea  name="description" class="form-control" rows="4"></textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                               <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
   </div>

@endsection
