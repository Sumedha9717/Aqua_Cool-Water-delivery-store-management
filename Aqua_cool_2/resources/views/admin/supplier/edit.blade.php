@extends('layouts.admin')

@section('content')

   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Supplier
                        <a href="{{ url('admin/supplier') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('admin/supplier/'.$supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label >Supplier Name</label>
                                <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" />
                                @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Slug</label>
                                <input type="text" name="slug" value="{{ $supplier->slug }}" class="form-control" />
                                @error('slug')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >City</label>
                                <input type="text" name="city" value="{{ $supplier->city }}" class="form-control" />
                                @error('city')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Address</label>
                                <input type="text" name="adress" value="{{ $supplier->adress }}" class="form-control" />
                                @error('adress')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Email</label>
                                <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" />
                                @error('email')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Telephone</label>
                                <input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control" />
                                @error('phone')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label >Description</label>
                                <textarea  name="description" class="form-control" rows="4">{{ $supplier->description }}</textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small> @enderror
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
