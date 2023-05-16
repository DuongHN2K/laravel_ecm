@extends('layouts.app')

@section('title', 'Tất cả danh mục')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Danh mục</h4>
            </div>
            @forelse ($category as $cateitem)
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{ url('/collections/'.$cateitem->slug) }}">
                        <div class="category-card-img">
                            <img src="{{ asset('images/categories/' . $cateitem->thumbnail) }}" class="w-100" alt="Thumbnail">
                        </div>
                        
                        <div class="category-card-body">
                            <h5>{{ $cateitem->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>Không có danh mục nào</h5>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection