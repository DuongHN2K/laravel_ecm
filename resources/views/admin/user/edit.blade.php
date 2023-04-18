@extends('layouts.master')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                Chỉnh sửa trạng thái người dùng
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
            </div>

            <form action=" {{ url('admin/users/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="h6">Vai trò</label>
                    <select name="user_type" class="form-control">
                        <option value="1" {{ $user->user_type == '1' ? 'selected':'' }}>Admin</option>
                        <option value="0" {{ $user->user_type == '0' ? 'selected':'' }}>Thành viên</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="h6">Đặt trạng thái</label> <br />
                    <label>Khóa người dùng</label>
                    <input type="checkbox" name="status" {{ $user->status == 1 ? 'checked':'' }}>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ url('admin/users') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection