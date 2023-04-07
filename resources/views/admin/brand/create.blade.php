@extends('layouts.master')

@section('title', 'Quản lý thương hiệu')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Thêm thương hiệu</h4>
        </div>
        
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/brands') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" name="name" class="form-control" autocomplete="off">
                </div>
                
                <h6>Đặt trạng thái</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="navbar_status">Thanh điều hướng</label>
                        <input type="checkbox" name="navbar_status">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="status">Ẩn</label>
                        <input type="checkbox" name="status">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Lưu thương hiệu</button>
                    <a href="{{ url('admin/brands') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection