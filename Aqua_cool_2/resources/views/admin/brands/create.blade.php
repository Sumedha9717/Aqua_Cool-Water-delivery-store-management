@extends('layouts.admin')

@section('content')

     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Brands
                        <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>

                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('admin/brands') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label >Brand Name</label>
                                <input type="text" name="brand_name" class="form-control"/>
                                @error('brand_name')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label >Brand Slug</label>
                                <input type="text" name="brand_slug" class="form-control"/>
                                @error('brand_slug')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >Image</label>
                                <input type="file" name="brand_image" class="form-control"/>
                                @error('brand_image')<small class="text-danger">{{ $message }}</small> @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label >Status</label><br/>
                                <input type="checkbox" name="status"/>
                            </div>


                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>

                       </div>

                    </form>

                </div>

            </div>
        </div>
     </div>

@endsection
