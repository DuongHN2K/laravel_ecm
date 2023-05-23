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
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emit('cartUpdated');
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

    public function checkQtyBeforeCheckout()
    {
        $isReady = false;
        foreach(Cart::content() as $cartitem)
        {
            if ($cartitem->qty > $cartitem->model->stock_quantity)
            {
                $isReady = false;
                break;
            }
            else
            {
                $isReady = true;
            }
        }
        
        if ($isReady == true)
        {
            return redirect('checkout');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Một trong các sản phẩm không đủ số lượng',
                'type' => 'warning',
                'status' => 200
            ]);
        }        
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-show');
    }
}
