@extends('layouts.app')

@section('title', 'Tìm kiếm sản phẩm')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Kết quả tìm kiếm</h4>
                <div class="underline mb-4"></div>
            </div>
            
            @forelse ($searchProducts as $proditem)
                <div class="col-md-10">
                    <div class="product-card">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-card-img">
                                    <img src="{{ asset('images/products/thumbnail/' . $proditem->thumbnail) }}" alt="thumbnail">
                                </div>
                            </div>
                            
                            <div class="col-md-9">
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $proditem->brand->name }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/' . $proditem->category->slug . '/' . $proditem->slug ) }}">
                                            {{ $proditem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">{{ number_format($proditem->price, 0, ',', '.') }} đ</span>
                                        {{-- <span class="original-price">$799</span> --}}
                                    </div>
                                    
                                    <a href="{{ url('/collections/' . $proditem->category->slug . '/' . $proditem->slug ) }}" class="btn btn1">
                                        <i class="fa fa-shopping-cart"></i>
                                        Mua ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 p-2">
                    <h4>Không tìm thấy sản phẩm nào</h4>
                </div>
            @endforelse

            <div>
                {{ $searchProducts->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection