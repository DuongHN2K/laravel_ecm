@extends('layouts.master')

@section('title', 'Quản lý danh mục')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Thêm danh mục</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-category') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="parent_category">Danh mục chính</label>
                    <select name="parent_category" id="parent_category" class="form-select">

                    </select>
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
                    <button type="submit" class="btn btn-primary">Lưu danh mục</button>
                    <a href="{{ url('admin/categories') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection