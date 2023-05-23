<div class="py-3 py-md-5 bg-light">
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <h4>Giỏ hàng của tôi</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">
                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Sản phẩm</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Giá</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Số lượng</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Giá tổng</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Xóa</h4>
                            </div>
                        </div>
                    </div>

                    @if (Cart::count() > 0)
                        @foreach (Cart::content() as $cartitem)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-4 my-auto">
                                    <a href="{{ url('collections/' . $cartitem->model->category->slug . '/' . $cartitem->model->slug) }}">
                                        <label class="product-name">
                                            <img src="{{ asset('images/products/thumbnail/' . $cartitem->model->thumbnail) }}" style="width: 50px; height: 50px" alt="">
                                            {{ $cartitem->model->name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{ number_format($cartitem->model->price, 0, ',', '.') }} đ</label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <span class="btn btn1" wire:click.prevent="quantityDecrement('{{ $cartitem->rowId }}')">
                                                <i class="fa fa-minus"></i>
                                            </span>
                                            <span class="count-quantity text-center">
                                                {{ $cartitem->qty }}
                                            </span>
                                            <span class="btn btn1" wire:click.prevent="quantityIncrement('{{ $cartitem->rowId }}')">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{ number_format($cartitem->subtotal, 0, ',', '.') }} đ</label>
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="destroy('{{ $cartitem->rowId }}')">
                                            <span wire:loading.remove wire:target="destroy('{{ $cartitem->rowId }}')">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span wire:loading wire:target="destroy('{{ $cartitem->rowId }}')">
                                                Đang xóa...
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    @else
                        <h5>Giỏ hàng trống</h5>
                    @endif

                    <div colspan="6" class="text-end py-3">
                        <a href="" class="text-muted" wire:click.prevent="clearAll()"> <i class="bi bi-trash-fill"></i> Xóa giỏ hàng </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 my-md-auto mt-3">
                <h5>
                    <a href="{{ url('/collections') }}">Tiếp tục mua hàng</a>
                </h5>
            </div>

            <div class="col-md-4">
                <div class="shadow-sm bg-white p-3">
                    <h5>
                        Tổng tiền:
                        <span class="float-end">
                            
                            {{ Cart::subtotal(0, ',', '.') }} đ
                        </span>
                    </h5>
                    <hr>
                    @if (Cart::count() > 0)
                        <a href="" class="btn btn-primary w-100" wire:click.prevent="checkQtyBeforeCheckout()"> Thanh toán </a>
                    @else
                        <button type="button" class="btn btn-primary w-100" disabled> Thanh toán </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>