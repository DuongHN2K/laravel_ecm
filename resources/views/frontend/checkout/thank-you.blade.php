@extends('layouts.app')

@section('title', 'Xin cảm ơn quý khách!')

@section('content')
<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if (session('message'))
                    <h5 class="alert">{{ session('message') }}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                    <h4>Xin cảm ơn quý khách đã mua hàng cùng chúng tôi!</h4>
                    <a href="{{ url('/') }}" class="btn btn-primary">Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection