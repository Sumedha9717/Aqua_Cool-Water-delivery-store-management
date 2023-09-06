@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">

        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>

                <div class="card-body">

                        @if($errors->any())
                            <div class="alert- alert-warning">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-12">
                                    <br><br><h3>Home</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand )
                                            <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Small_Description</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <br><br><h3>SEO Tags</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta_Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <br><br><h3>Details</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Original Price</label>
                                    <input type="text" name="original_price" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" style="width: 50px; height: 50px;" />
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" style="width: 50px; height: 50px;" />
                                </div>


                                <div class="col-md-12">
                                    <br><br><h3>Images</h3><br><br>
                                </div>

                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control"/>
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
