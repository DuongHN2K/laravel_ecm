@extends('layouts.app')

@section('title', 'LaraKon Home')

@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Xin kính chào quý khách!</h4>
                <div class="underline mx-auto"></div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem numquam temporibus asperiores consequatur, mollitia exercitationem, neque error vero eos, doloribus tempora ad beatae magni! Doloribus deleniti fugiat veniam neque, voluptatibus laboriosam dignissimos accusantium enim alias vel qui ab nihil quas hic cumque maiores impedit adipisci dolorem tempora provident. Tempore, explicabo!
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Sản phẩm nổi bật
                    <a href="{{ url('trendings') }}" class="btn btn-warning float-end">Xem thêm</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            @if ($trendingProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach ($trendingProducts as $proditem)
                    <div class="item">
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
                                    <a href="" class="btn btn1">Thêm vào giỏ hàng</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nổi bật nào</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Hàng mới về
                    <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">Xem thêm</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            @if ($newArrivals)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme four-carousel">
                @foreach ($newArrivals as $proditem)
                    <div class="item">
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
                                    <a href="" class="btn btn1">Thêm vào giỏ hàng</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm mới nào</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.four-carousel').owlCarousel({
        loop:false,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection