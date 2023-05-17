@extends('layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>
                    Thông tin cá nhân
                    <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Đổi mật khẩu</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            <div class="col-md-10">
                @if (session('message'))
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Tên người dùng</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" readonly value="{{ Auth::user()->email }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->phone_number }}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Mã bưu điện</label>
                                        <input type="text" name="postal_code" value="{{ Auth::user()->userDetail->postal_code ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Địa chỉ</label>
                                        <textarea name="address" rows="3" class="form-control">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection