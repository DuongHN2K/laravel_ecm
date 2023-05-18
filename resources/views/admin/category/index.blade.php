@extends('layouts.master')

@section('title', 'Quản lý danh mục')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Hiện danh mục
                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-sm float-end">
                    Thêm danh mục
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
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Ảnh đại diện</th>
                        {{-- <th>Danh mục chính</th> --}}
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($category as $cateitem)
                        <tr>
                            <td>{{ $orderCount++ }}</td>
                            <td>{{ $cateitem->name }}</td>
                            <td>{{ $cateitem->slug }}</td>
                            <td> 
                                <img src="{{ asset('images/categories/' . $cateitem->thumbnail) }}" width="70px" height="70px" alt="Thumbnail">
                            </td>
                            {{-- <td>
                                @if ($cateitem->parent_id == '')
                                    Là danh mục chính
                                @else
                                    {{ $cateitem->parent->name }}
                                @endif
                            </td> --}}
                            <td>{{ $cateitem->status == '1' ? 'Ẩn':'Hiện' }}</td>
                            <td>
                                <div class="row">
                                    {{-- <div class="col-md-3">
                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                    </div> --}}

                                    <div class="col-md-3">
                                        <a href="{{ url('admin/categories/'.$cateitem->id.'/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <form action="{{ url('admin/categories/'.$cateitem->id) }}" method="POST">
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