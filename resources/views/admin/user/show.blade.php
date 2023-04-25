@extends('layouts.master')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Chi tiết người dùng
            </h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label class="h6">Tên người dùng:</label>
                    <p> {{ $user->name }} </p>
                </div>
    
                <div class="mb-3 col-md-3">
                    <label class="h6">Email:</label>
                    <p> {{ $user->email }} </p>
                </div>
    
                <div class="mb-3 col-md-3">
                    <label class="h6">Số điện thoại:</label>
                    <p> {{ $user->phone_number }} </p>
                </div>
    
                <div class="mb-3 col-md-3">
                    <label class="h6">Thời gian được tạo:</label>
                    <p> {{ $user->created_at->format('d/m/Y') }} </p>
                </div>
    
                <div class="mb-3 col-md-3">
                    <label class="h6">Vai trò:</label>
                    <p> {{ $user->user_type == '1' ? 'Admin':'Thành viên' }} </p>
                </div>
    
                <div class="mb-3 col-md-3">
                    <label class="h6">Trạng thái:</label>
                    <p> {{ $user->status == '1' ? 'Khóa':'Mở' }} </p>
                </div>
            </div>

            <div class="col-md-6">
                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-success">
                    Sửa
                </a>
                <a href="{{ url('admin/users') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection