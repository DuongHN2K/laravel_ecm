@extends('layouts.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div>
    <livewire:frontend.product.show :category="$category" :product="$product" />
</div>
@endsection