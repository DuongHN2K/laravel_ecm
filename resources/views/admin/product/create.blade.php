@extends('layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Tạo sản phẩm mới
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="h6">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="h6">Slug</label>
                    <input type="text" name="slug" class="form-control" autocomplete="off" value="{{ old('slug') }}">
                    @error('slug')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="h6">Danh mục</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="brand" class="h6">Thương hiệu</label>
                    <select name="brand" id="brand" class="form-select">
                        @foreach ($brand as $branditem)
                            <option value="{{ $branditem->id }}">{{ $branditem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="h6">Mô tả</label>
                    <textarea rows="5" name="description" id="mySummernote" class="form-control" autocomplete="off">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="h6">Giá bán</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock_quantity" class="h6">Số lượng</label>
                    <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity') }}">
                    @error('stock_quantity')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="h6">Ảnh đại diện (Chọn một ảnh)</label>
                    <input type="file" name="thumbnail" class="form-control">
                    @error('thumbnail')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="images" class="h6">Ảnh sản phẩm (Chọn một hoặc nhiều ảnh)</label>
                    <input type="file" name="images[]" multiple class="form-control">
                    @error('images')
                        <p class="text-danger text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="discounts" class="h6">Chương trình khuyến mại</label>
                    <select name="discount" id="discount" class="form-select">
                        <option value="">Không có</option>
                        @foreach ($discount as $disitem)
                            <option value="{{ $disitem->id }}">{{ $disitem->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <h6>Đặt trạng thái</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="status">Ẩn</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="trending">Hàng nổi bật</label>
                        <input type="checkbox" name="trending">
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                    <a href="{{ url('admin/products') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection