<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\Redirect;

class Show extends Component
{
    public $category, $product, $qty = 1;

    public function addToWishlist($productId)
    {
        if(Auth::check())
        {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) 
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm đã có trong mục ưa thích',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } 
            else 
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã thêm vào mục ưa thích',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Mời bạn vui lòng đăng nhập để tiếp tục',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function quantityDecrement()
    {
        if ($this->qty > 1) 
        {
            $this->qty--;
        }
    }

    public function quantityIncrement()
    {
        if ($this->qty < 10) 
        {
            $this->qty++;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function addToCart($productId, $productName, $qty, $productPrice)
    {
        if ($qty > $this->product->stock_quantity)
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Sản phẩm không đủ số lượng',
                'type' => 'warning',
                'status' => 409
            ]);
        }
        else
        {
            Cart::add($productId, $productName, $qty, $productPrice)->associate('App\Models\Product');
            $this->emit('cartUpdated');
            return redirect('cart');
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.show', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
