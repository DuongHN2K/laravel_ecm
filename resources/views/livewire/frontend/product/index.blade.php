<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Khoảng giá</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"> Giảm dần
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"> Tăng dần
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
            @forelse ($product as $proditem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if ($proditem->stock_quantity > 0)
                                <label class="stock bg-success">Còn hàng</label>
                            @else
                                <label class="stock bg-danger">Hết hàng</label>
                            @endif
                            <img src="{{ asset('images/products/thumbnail/' . $proditem->thumbnail) }}" alt="thumbnail">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $proditem->brand->name }}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/' . $proditem->category->slug . '/' . $proditem->slug ) }}">
                                    {{ $proditem->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{ $proditem->price }} VNĐ</span>
                                {{-- <span class="original-price">$799</span> --}}
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Thêm vào giỏ hàng</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Không có sản phẩm nào trong danh mục này</h4>
                    </div>
                </div>
            @endforelse
            </div>
        </div>
    </div>
</div>
