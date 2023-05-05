<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Cart;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = ['cartUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        return $this->cartCount = Cart::count();
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
