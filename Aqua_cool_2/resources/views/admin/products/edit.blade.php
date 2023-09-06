@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">

        @if (session('message'))
        <h4 class="alert- alert-success mb-2">{{ session('message') }}</h4>
         @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Products
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

                        <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-12">
                                    <br><br><h3>Home</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected':''}}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand )
                                            <option value="{{ $brand->brand_name }}" {{$brand->brand_name == $product->brand ? 'selected':''}}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Small_Description</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <br><br><h3>SEO Tags</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Meta_Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <br><br><h3>Details</h3><br><br>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Original Price</label>
                                    <input type="text" name="original_price" value="{{ $product->original_price }}" class="form-control"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':'' }} style="width: 50px; height: 50px;" />
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50px;" />
                                </div>


                                <div class="col-md-12">
                                    <br><br><h3>Images</h3><br><br>
                                </div>

                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control"/><br><br>
                                </div>

                                <div class="col-md-12">
                                    @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" style="width: 100px;Height:100px;" class="me-4 border" alt="Img" />
                                            <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class=" btn btn-info btn-md">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>

                                    @else
                                    <h5>No Image Uploaded</h5>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3">
                                    <br><br><br><button type="submit" class="btn btn-success float-end">Update</button>
                                </div>

                            </div>

                        </form>

                </div>
        </div>
    </div>
</div>

@endsection
