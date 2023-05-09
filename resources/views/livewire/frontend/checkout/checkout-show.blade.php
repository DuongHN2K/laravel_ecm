<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Thanh toán</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Tổng tiền đơn hàng:
                            <span class="float-end">{{ $this->totalAmount }} VNĐ</span>
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
                                <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" class="form-control" placeholder="Nhập số điện thoại" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Nhập Email" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Mã bưu điện</label>
                                <input type="number" name="pincode" class="form-control" placeholder="Nhập mã bưu điện" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Địa chỉ</label>
                                <textarea name="address" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label> Chọn phương thức thanh toán: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Tiền mặt</button>
                                        <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Trực tuyến</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Tiền mặt (thanh toán trực tiếp khi nhận hàng)</h6>
                                            <hr/>
                                            <button type="button" class="btn btn-primary">Xác nhận đặt hàng</button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Thanh toán trực tuyến</h6>
                                            <hr/>
                                            <button type="button" class="btn btn-warning">Thanh toán ngay bây giờ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
