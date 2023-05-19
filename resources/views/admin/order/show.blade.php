@extends('layouts.master')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Chi tiết đơn hàng
            </h4>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Thông tin đơn hàng</h5>
                        <hr>
                        <h6>ID đơn hàng: {{ $order->id }}</h6>
                        <h6>Ngày đặt: {{ $order->created_at->format('d-m-Y h:i') }}</h6>
                        <h6>Phương thức thanh toán: {{ $order->payment_type }}</h6>
                        <h6 class="border p-2 text-success">
                            Trạng thái đơn hàng: <span class="text-uppercase">{{ $order->status_message }}</span>
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <h5>Thông tin người dùng</h5>
                        <hr>
                        <h6>Họ tên: {{ $order->full_name }}</h6>
                        <h6>Email: {{ $order->email }}</h6>
                        <h6>Điện thoại: {{ $order->phone }}</h6>
                        <h6>Địa chỉ: {{ $order->address }}</h6>
                        <h6>Mã bưu điện: {{ $order->postal_code}}</h6>
                    </div>
                </div>
                <br />

                <h5>Sản phẩm đã đặt mua</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID sản phẩm</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Giá tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach ($order->orderItems as $orderitem)
                            <tr>
                                <td width="15%">{{ $orderitem->id }}</td>
                                <td width="15%">
                                    <img src="{{ asset('images/products/thumbnail/' . $orderitem->product->thumbnail) }}" style="width: 70px; height: 70px" alt="">
                                </td>
                                <td>{{ $orderitem->product->name }}</td>
                                <td>{{ number_format($orderitem->price, 0, ",", ".") }} đ</td>
                                <td>{{ $orderitem->quantity }}</td>
                                <td class="fw-bold">{{ number_format($orderitem->quantity * $orderitem->price, 0, ",", ".") }} đ</td>
                                @php
                                    $totalPrice += $orderitem->price * $orderitem->quantity;
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="fw-bold">Tổng tiền đơn hàng:</td>
                                <td colspan="1" class="fw-bold">{{ number_format($totalPrice, 0, ",", ".") }} đ</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-md-6">
                        <a href="{{ url('admin/orders/'.$order->id.'/edit') }}" class="btn btn-success">
                            Sửa
                        </a>
                        <a href="{{ url('admin/orders') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection