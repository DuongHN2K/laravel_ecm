@extends('layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Hiện sản phẩm
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">
                    Thêm sản phẩm
                </a>
            </h4>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá bán</th>
                        <th>Số lượng còn lại</th>
                        <th>Trạng thái</th>
                        <th style="width:18%">Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product as $proditem)
                        <tr>
                            <td>{{ $orderCount++ }}</td>
                            <td>{{ $proditem->name }}</td>
                            <td>{{ $proditem->category->name }}</td>
                            <td>{{ number_format($proditem->price, 0, ",", ".") }} đ</td>
                            <td>{{ $proditem->stock_quantity }}</td>
                            <td>{{ $proditem->status == '1' ? 'Ẩn':'Hiện' }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('admin/products/'.$proditem->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <a href="{{ url('admin/products/'.$proditem->id.'/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </div>

                                    <div class="col-md-4">
                                        <form action="{{ url('admin/products/'.$proditem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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