<div>
    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif

            <div class="row">
                <div class="product-view">
                    <p class="product-path">
                        <a href="{{ url('/') }}">Trang chủ</a>/ 
                        <a href="{{ url('collections/'.$category->slug) }}">{{ $product->category->name }}</a>/ 
                        {{ $product->name }}
                    </p>
                </div>

                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->images)
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @php
                                        $img_files = explode("|", $product->images);
                                    @endphp
                                    @foreach ($img_files as $file)
                                        <li>
                                            <img src="{{ asset('images/products/product_images/' . $file) }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
                        @else
                            Không có ảnh nào cho sản phẩm
                        @endif
                    </div>
                </div>
                
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>

                        <p class="product-path">Thương hiệu: {{ $product->brand->name }}</p>
                        
                        <div>
                            <span class="selling-price">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                            {{-- <span class="original-price">$499</span> --}}
                        </div>
                        
                        <div>
                            @if ($product->stock_quantity > 0)
                                <label class="btn btn-sm py-1 mt-2 text-white bg-success">Còn hàng</label>
                            @else
                                <label class="btn btn-sm py-1 mt-2 text-white bg-danger">Hết hàng</label>
                            @endif
                        </div>
                        
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="quantityDecrement">
                                    <i class="fa fa-minus"></i>
                                </span>
                                <input type="text" wire:model="qty" readonly value="{{ $this->qty }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="quantityIncrement">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <button 
                            type="button" class="btn btn1"
                            wire:click.prevent="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $this->qty }}, {{ $product->price }})"
                            > 
                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng 
                            </button>
                            @if ($wlitem->exists())
                            <button type="button" wire:click="removeFromWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:target="removeFromWishlist">
                                    <i class="bi bi-heart-fill"></i> Bỏ ưa thích
                                </span> 
                            </button>
                            @else
                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:target="addToWishlist">
                                    <i class="bi bi-heart"></i> Ưa thích 
                                </span> 
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Mô tả</h4>
                        </div>
                        
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Sản phẩm tương tự</h3>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if ($category->relatedProducts->where('id', '!=', $product->id))
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts->where('id', '!=', $product->id) as $relproditem)
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <img src="{{ asset('images/products/thumbnail/' . $relproditem->thumbnail) }}" alt="thumbnail">
                                        </div>
                    
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $relproditem->brand->name }}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/' . $relproditem->category->slug . '/' . $relproditem->slug ) }}">
                                                    {{ $relproditem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">{{ $relproditem->price }} VNĐ</span>
                                                {{-- <span class="original-price">$799</span> --}}
                                            </div>
                                            <div class="mt-2">
                                                <a href="{{ url('/collections/' . $relproditem->category->slug . '/' . $relproditem->slug ) }}" class="btn btn1">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Mua ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h4>Không có sản phẩm nào tương tự</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Sản phẩm khác của
                        @if ($product)
                            {{ $product->brand->name }}
                        @endif
                    </h3>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($category->relatedProducts->where('id', '!=', $product->id) as $relproditem)
                                @if ($relproditem->brand == "$product->brand")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <img src="{{ asset('images/products/thumbnail/' . $relproditem->thumbnail) }}" alt="thumbnail">
                                            </div>
                        
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $relproditem->brand->name }}</p>
                                                <h5 class="product-name">
                                                    <a href="{{ url('/collections/' . $relproditem->category->slug . '/' . $relproditem->slug ) }}">
                                                        {{ $relproditem->name }}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">{{ $relproditem->price }} VNĐ</span>
                                                    {{-- <span class="original-price">$799</span> --}}
                                                </div>
                                                <div class="mt-2">
                                                    <a href="{{ url('/collections/' . $relproditem->category->slug . '/' . $relproditem->slug ) }}" class="btn btn1">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h4>Thương hiệu không có sản phẩm nào khác</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){
        $("#exzoom").exzoom({
            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000
        });
    });

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
    });
</script>
@endpush