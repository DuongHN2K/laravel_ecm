@extends('layouts.master')

@section('title', 'Quản lý danh mục')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Sửa thông tin danh mục</h4>
        </div>
        
        <div class="card-body">
            <form action="{{ url('admin/categories/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="h6">Tên danh mục</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" autocomplete="off">
                    @error('name')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="h6">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" autocomplete="off">
                    @error('slug')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="parent_category" class="h6">Danh mục chính</label>
                    <select name="parent_category" id="parent_category" class="form-select">
                        <option value="">Là danh mục chính</option>
                        @foreach ($totalCategory as $cateitem)
                            @if ($cateitem->parent_id == '')
                                <option value="{{ $cateitem->id }}" {{ $category->parent_id == $cateitem->id ? 'selected':'' }}>{{ $cateitem->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label for="thumbnail" class="h6">Ảnh đại diện (Chọn một ảnh)</label>
                    <input type="file" name="thumbnail" class="form-control">
                    @error('thumbnail')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>
                
                <h6>Đặt trạng thái</h6>
                <div class="row">
                    {{-- <div class="col-md-3 mb-3">
                        <label for="navbar_status">Thanh điều hướng</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == 1 ? 'checked':'' }}>
                    </div> --}}
                    <div class="col-md-3 mb-3">
                        <label for="status">Ẩn</label>
                        <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked':'' }}>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ url('admin/categories') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection