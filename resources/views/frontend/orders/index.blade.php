@extends('layouts.app')

@section('title', 'Lịch sử mua hàng')

@section('content')
<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">Đơn hàng của tôi</h4>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>PT thanh toán</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $orderitem)
                                    <tr>
                                        <td>{{ $orderCount++ }}</td>
                                        <td>{{ $orderitem->id }}</td>
                                        <td>{{ $orderitem->full_name }}</td>
                                        <td>{{ $orderitem->payment_type}}</td>
                                        <td>{{ $orderitem->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $orderitem->status_message}}</td>
                                        <td>
                                            <a href="{{ url('orders/'.$orderitem->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="7">Không có đơn hàng nào</td>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection