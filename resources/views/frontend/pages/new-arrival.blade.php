@extends('layouts.app')

@section('title', 'Hàng mới về')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Hàng mới về</h4>
                <div class="underline mb-4"></div>
            </div>
            
            @forelse ($newArrivals as $proditem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">Mới</label>
                            <img src="{{ asset('images/products/thumbnail/' . $proditem->thumbnail) }}" alt="thumbnail">
                        </div>
    
                        <div class="product-card-body">
                            <p class="product-brand">{{ $proditem->brand->name }}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/' . $proditem->category->slug . '/' . $proditem->slug ) }}">
                                    {{ $proditem->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $proditem->price }} VNĐ</span>
                                {{-- <span class="original-price">$799</span> --}}
                            </div>
                            <div class="mt-2">
                                <a href="{{ url('/collections/' . $proditem->category->slug . '/' . $proditem->slug ) }}" class="btn btn1">
                                    <i class="fa fa-shopping-cart"></i>
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 p-2">
                    <h4>Không có sản phẩm nào</h4>
                </div>
            @endforelse

            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-warning px-3"> Khám phá thêm </a>
            </div>
        </div>
    </div>
</div>
@endsection