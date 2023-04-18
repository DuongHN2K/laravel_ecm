@extends('layouts.master')

@section('title', 'Quản lý thương hiệu')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Hiện thương hiệu
                <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm float-end">
                    Thêm thương hiệu
                </a>
            </h4>
        </div>

        <div class="card-body">
            @if (session('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thương hiệu</th>
                        <th>Trạng thái</th>
                        <th class="w-25" colspan="2">Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($brand as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == '1' ? 'Ẩn':'Hiện' }}</td>
                            {{--                             
                            <td>
                                <a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Chi tiết">
                                    <i class="bi bi-info-circle"></i>
                                </a>
                            </td>
                            --}}
                            <td>
                                <a href="{{ url('admin/brands/'.$item->id.'/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ url('admin/brands/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection