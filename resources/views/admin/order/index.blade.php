@extends('layouts.master')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Hiện đơn hàng
            </h4>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form action="" method="GET">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="h6">Lọc theo ngày</label>
                        <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control" />
                    </div>
                    
                    <div class="col-md-3">
                        <label class="h6">Lọc theo trạng thái</label>
                        <select name="status" class="form-select">
                            <option value="">Tất cả</option>
                            <option value="đang xử lý" {{ Request::get('status') == 'đang xử lý' ? 'selected':'' }}>Đang xử lý</option>
                            <option value="đang đóng gói" {{ Request::get('status') == 'đang đóng gói' ? 'selected':'' }}>Đang đóng gói</option>
                            <option value="đang giao hàng" {{ Request::get('status') == 'đang giao hàng' ? 'selected':'' }}>Đang giao hàng</option>
                            <option value="đã giao hàng" {{ Request::get('status') == 'đã giao hàng' ? 'selected':'' }}>Đã giao hàng</option>
                            <option value="đã hủy" {{ Request::get('status') == 'đã hủy' ? 'selected':'' }}>Đã hủy</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <br>
                        <button type="submit" class="btn btn-primary">Áp dụng</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered" id="myTable">
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
                    @foreach ($orders as $orderitem)
                        <tr>
                            <td>{{ $orderCount++ }}</td>
                            <td>{{ $orderitem->id }}</td>
                            <td>{{ $orderitem->full_name }}</td>
                            <td>{{ $orderitem->payment_type}}</td>
                            <td>{{ $orderitem->created_at->format('d-m-Y')}}</td>
                            <td>{{ $orderitem->status_message}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ url('admin/orders/'.$orderitem->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                    </div>

                                    @if ($orderitem->status_message == 'đã hủy' || $orderitem->status_message == 'đã giao hàng')
                                    <div class="col-md-6">
                                        <button class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa" disabled>
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </div>
                                    @else
                                    <div class="col-md-6">
                                        <a href="{{ url('admin/orders/'.$orderitem->id.'/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection