<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>
                Thanh toán
                <a href="{{ url('cart') }}" class="btn btn-secondary btn-sm float-end">Quay lại giỏ hàng</a>
            </h4>
            <hr>

            @if ($this->totalAmount != 0)
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
                                    <h4>Số lượng</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Giá tổng</h4>
                                </div>
                            </div>
                        </div>
    
                        @foreach (Cart::content() as $cartitem)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{ url('collections/' . $cartitem->model->category->slug . '/' . $cartitem->model->slug) }}">
                                        <label class="product-name">
                                            <img src="{{ asset('images/products/thumbnail/' . $cartitem->model->thumbnail) }}" style="width: 50px; height: 50px" alt="">
                                            {{ $cartitem->model->name }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price"> {{ number_format($cartitem->model->price, 0, ',', '.') }} đ</label>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price"> {{ $cartitem->qty }} </span>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price"> {{ number_format($cartitem->subtotal, 0, ',', '.') }} đ</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Tổng tiền đơn hàng:
                            <span class="float-end">{{ $this->totalAmount }} đ</span>
                        </h4>
                        <hr>
                        <small>* Hàng sẽ được giao đến trong 3-5 ngày.</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Thông tin cơ bản
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Họ tên</label>
                                <input type="text" wire:model.defer="fullname" class="form-control" placeholder="Nhập họ tên" required/>
                                @error('fullname')
                                    <p class="text-danger text-sm mt-1">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Số điện thoại</label>
                                <input type="number" wire:model.defer="phone" class="form-control" placeholder="Nhập số điện thoại" required/>
                                @error('phone')
                                    <p class="text-danger text-sm mt-1">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" wire:model.defer="email" class="form-control" placeholder="Nhập Email" required/>
                                @error('email')
                                    <p class="text-danger text-sm mt-1">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Mã bưu điện</label>
                                <input type="number" wire:model.defer="postalcode" class="form-control" placeholder="Nhập mã bưu điện" required/>
                                @error('postalcode')
                                    <p class="text-danger text-sm mt-1">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Địa chỉ</label>
                                <textarea wire:model.defer="address" class="form-control" rows="2" required></textarea>
                                @error('address')
                                    <p class="text-danger text-sm mt-1">* {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label> Chọn phương thức thanh toán: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Tiền mặt</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Tiền mặt (thanh toán trực tiếp khi nhận hàng)</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Xác nhận đặt hàng
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Đang xác nhận...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="card card-body shadow text-center">
                    <h4>Không có sản phẩm nào</h4>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Mua hàng ngay</a>
                </div>
            @endif
        </div>
    </div>

</div>
