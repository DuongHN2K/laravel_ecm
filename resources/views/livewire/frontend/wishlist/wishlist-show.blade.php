<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>Mục ưa thích</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Sản phẩm</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Giá</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Xóa</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($wishlist as $wlitem)
                            @if ($wlitem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{ url('collections/' . $wlitem->product->category->slug . '/' . $wlitem->product->slug) }}">
                                            <label class="product-name">
                                                <img src="{{ asset('images/products/thumbnail/' . $wlitem->product->thumbnail) }}" style="width: 50px; height: 50px" alt="">
                                                {{ $wlitem->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price"> {{$wlitem->product->price}} VNĐ </label>
                                    </div>
                                    
                                    <div class="col-md-4 col-12 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:click="removeWishlistItem({{ $wlitem->id }})" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeWishlistItem({{ $wlitem->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <span wire:loading wire:target="removeWishlistItem({{ $wlitem->id }})">
                                                    Đang xóa...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif  
                        @empty
                            <h4> Danh sách trống </h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
