@extends('layouts.app')

@section('title')
    {{ $product->meta_title }}
@endsection

@section('meta_keyword')
    {{ $product->meta_keyword }}
@endsection

@section('meta_description')
    {{ $product->meta_description }}
@endsection

@section('content')

{{-- <h4>Product view page</h4> --}}
<div>
    <livewire:frontend.product.view :category="$category" :product="$product" />
</div>

@endsection
