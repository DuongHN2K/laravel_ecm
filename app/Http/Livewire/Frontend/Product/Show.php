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
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Mời bạn vui lòng đăng nhập để tiếp tục',
                'type' => 'warning',
                'status' => 401
            ]);
            return false;
        }
    }

    public function removeFromWishlist()
    {
        Wishlist::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->delete();
        $this->emit('wishlistUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Đã xóa sản phẩm khỏi mục ưa thích',
            'type' => 'success',
            'status' => 200
        ]);
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
        $wlitem = Wishlist::where('user_id', auth()?->user()?->id)->where('product_id', $this->product->id);
        return view('livewire.frontend.product.show', [
            'category' => $this->category,
            'product' => $this->product,
            'wlitem' => $wlitem,
        ]);
    }
}
