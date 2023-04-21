@extends('layouts.master')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Hiện người dùng
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
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $useritem)
                        <tr>
                            <td>{{ $useritem->id }}</td>
                            <td>{{ $useritem->name }}</td>
                            <td>{{ $useritem->email }}</td>
                            <td>{{ $useritem->phone_number }}</td>
                            <td>{{ $useritem->user_type == '1' ? 'Admin':'Thành viên' }}</td>
                            <td>{{ $useritem->status == '1' ? 'Khóa':'Mở' }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ url('admin/users/'.$useritem->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Chi tiết">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="{{ url('admin/users/'.$useritem->id.'/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Sửa">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
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