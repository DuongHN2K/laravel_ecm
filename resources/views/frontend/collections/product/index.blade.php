@extends('layouts.app')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="product-view">
                <p class="product-path">
                    <a href="{{ url('/') }}">Trang chủ</a>/ 
                    {{ $category->name }}
                </p>
            </div>
            
            <livewire:frontend.product.index :product="$product" :category="$category" />
        </div>
    </div>
</div>
@endsection