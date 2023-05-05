<div>
    <div class="py-3 py-md-5">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="{{ asset('images/products/thumbnail/' . $product->thumbnail) }}" class="w-100" alt="Img">
                    </div>
                </div>
                
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        
                        <p class="product-path">
                            Trang chủ / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        
                        <div>
                            <span class="selling-price">{{ $product->price }} VNĐ</span>
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
                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Ưa thích 
                                </span> 
                                <span wire:loading wire:target="addToWishlist">
                                    Đang thêm...
                                </span>
                            </button>
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
</div>
