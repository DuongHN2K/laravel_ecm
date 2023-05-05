<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Cart;

class CartShow extends Component
{
    public function quantityDecrement($rowId)
    {
        $product = Cart::get($rowId);
        if ($product->qty > 1) 
        {
            $qty = $product->qty - 1;
            Cart::update($rowId, $qty);
            $this->emit('cartUpdated');
        }
    }

    public function quantityIncrement($rowId)
    {
        $product = Cart::get($rowId);
        if ($product->qty < 10) 
        {
            $qty = $product->qty + 1;
            Cart::update($rowId, $qty);
            $this->emit('cartUpdated');
        }
    } 

    public function destroy($id)
    {
        Cart::remove($id);
        $this->emit('cartUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Đã bỏ sản phẩm khỏi giỏ hàng',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function clearAll()
    {
        Cart::destroy();
        $this->emit('cartUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Đã xóa tất cả sản phẩm khỏi giỏ hàng',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-show');
    }
}
