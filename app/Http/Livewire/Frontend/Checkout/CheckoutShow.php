<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use Cart;

class CheckoutShow extends Component
{
    public $totalAmount;
    public function totalAmount()
    {
        foreach (Cart::content() as $cartitem) {
            $this->totalAmount = $cartitem->subtotal;
        }
        return $this->totalAmount;
    }

    public function render()
    {
        $this->totalAmount = $this->totalAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalAmount' => $this->totalAmount
        ]);
    }
}
