
@extends('layouts.admin')

@section('content')

            <div class="row">
                <div class="col-md-12 ">

                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Brand
                                <a href="{{ url('admin/brands') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                            </h3>
                        </div>

                            <div class="card-body">

                                <form action="{{ url('admin/brands'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label >Brand Name</label>
                                            <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control"/>
                                            @error('brand_name')<small class="text-danger">{{ $message }}</small> @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label >Brand Slug</label>
                                            <input type="text" name="brand_slug" value="{{ $brand->brand_slug }}" class="form-control"/>
                                            @error('brand_slug')<small class="text-danger">{{ $message }}</small> @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label >Brand Image</label>
                                            <input type="file" name="brand_image" class="form-control"/>
                                            <img src="{{ asset('/uploads/brands/'.$brand->brand_image) }}" width="300px" height="300px"/>
                                            @error('brand_image')<small class="text-danger">{{ $message }}</small> @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label >Status</label><br/>
                                            <input type="checkbox" name="status"{{ $brand->status == '1' ? 'checked':'' }}/>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-success float-end">Update</button>
                                        </div>

                                   </div>

                                </form>

                            </div>

                    </div>

                </div>
            </div>

            @endsection
