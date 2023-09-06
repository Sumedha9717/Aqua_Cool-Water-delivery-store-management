@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 ">

        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>

        @endif

        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">
                        Add Products
                    </a>
                </h3>
            </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Product</th>
                                {{-- <th>Description</th> --}}
                                <th>Price</th>
                                <th>Selling Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->category)
                                        {{ $product->category->name }}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->name }}</td>
                                {{-- <td>{{ $product->small_description }}</td> --}}
                                <td>Rs.{{ $product->original_price }}</td>
                                <td>Rs.{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are You Sure, You Want to Delete this Data..?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">No Products Available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

@endsection
