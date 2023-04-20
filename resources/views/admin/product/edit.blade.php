@extends('layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Chỉnh sửa thông tin sản phẩm
            </h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="h6">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="category" class="h6">Danh mục</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}" {{ $product->category_id == $cateitem->id ? 'selected':'' }}>{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="brand" class="h6">Thương hiệu</label>
                    <select name="brand" id="brand" class="form-select">
                        @foreach ($brand as $branditem)
                            <option value="{{ $branditem->id }}" {{ $product->brand_id == $branditem->id ? 'selected':'' }}>{{ $branditem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="h6">Mô tả</label>
                    <textarea rows="5" name="description" class="form-control" autocomplete="off">
                        {{ $product->description }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="h6">Giá bán</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="stock_quantity" class="h6">Số lượng</label>
                    <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="h6">Ảnh đại diện (Chọn một ảnh)</label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="images" class="h6">Ảnh sản phẩm (Chọn một hoặc nhiều ảnh)</label>
                    <input type="file" name="images" multiple class="form-control">
                </div>

                <div class="mb-3">
                    <label for="discounts" class="h6">Chương trình khuyến mại</label>
                    <select name="discount" id="discount" class="form-select">
                        <option value="">Không có</option>
                        @foreach ($discount as $disitem)
                            <option value="{{ $disitem->id }}" {{ $product->discount_id == $disitem->id ? 'selected':'' }}>{{ $disitem->name }}</option>
                        @endforeach
                    </select>
                </div>

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
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ url('admin/products') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection