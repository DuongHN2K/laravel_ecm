@extends('layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Chi tiết sản phẩm
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label class="h6">Tên sản phẩm:</label>
                <p> {{ $product->name }} </p>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="h6">Danh mục:</label>
                    <p> {{ $product->category->name }} </p>
                </div>
    
                <div class="mb-3 col-md-6">
                    <label class="h6">Thương hiệu:</label>
                    <p> {{ $product->brand->name }} </p>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="h6">Mô tả:</label>
                <p> {{ $product->description }} </p>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="h6">Giá bán:</label>
                    <p> {{ $product->price }} VNĐ </p>
                </div>
    
                <div class="mb-3 col-md-6">
                    <label class="h6">Số lượng còn lại:</label>
                    <p> {{ $product->stock_quantity }} </p>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="h6">Ảnh đại diện:</label>
                    <img src="{{ asset('images/products/thumbnail/' . $product->thumbnail) }}" width="70px" height="70px" alt="Thumbnail">
                </div>
    
                <div class="mb-3 col-md-6">
                    <label class="h6">Ảnh sản phẩm:</label>
                    @php
                        $img_files = explode("|", $product->images);
                    @endphp
                    @foreach ($img_files as $file)
                        <img src="{{ asset('images/products/product_images/' . $file) }}" width="70px" height="70px" alt="images">
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label class="h6">Thời gian được tạo:</label>
                <p> {{ $product->created_at->format('d/m/Y') }} </p>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="h6">Trạng thái:</label>
                    <p> {{ $product->status == '1' ? 'Khóa':'Mở' }} </p>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="h6">Là hàng nổi bật:</label>
                    <p> {{ $product->trending == '1' ? 'Có':'Không' }} </p>
                </div>
            </div>

            <div class="col-md-6">
                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">
                    Sửa
                </a>
                <a href="{{ url('admin/products') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection