@extends('layouts.master')

@section('title', 'Quản lý danh mục')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Thêm danh mục</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="h6">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="slug" class="h6">Slug</label>
                    <input type="text" name="slug" class="form-control" autocomplete="off">
                </div>
                
                {{-- <div class="mb-3">
                    <label for="parent_category" class="h6">Danh mục chính</label>
                    <select name="parent_category" id="parent_category" class="form-select">
                        <option value="">Là danh mục chính</option>
                        @foreach ($category as $option)
                            @if ($option->parent_id == '')
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label for="thumbnail" class="h6">Ảnh đại diện (Chọn một ảnh)</label>
                    <input type="file" required name="thumbnail" class="form-control">
                </div>
                
                <h6>Đặt trạng thái</h6>
                <div class="row">
                    {{-- <div class="col-md-3 mb-3">
                        <label for="navbar_status">Thanh điều hướng</label>
                        <input type="checkbox" name="navbar_status">
                    </div> --}}
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