<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;

class CheckoutShow extends Component
{
    public $totalAmount = 0;
    public $fullname, $email, $phone, $postalcode, $address, $paymenttype = NULL, $paymentid = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'postalcode' => 'required|string|max:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'full_name' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'postal_code' => $this->postalcode,
            'address' => $this->address,
            'status_message' => 'đang xử lý',
            'payment_type' => $this->paymenttype,
            'payment_id' => $this->paymentid
        ]);

        foreach (Cart::content() as $cartitem) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartitem->model->id,
                'quantity' => $cartitem->qty,
                'price' => $cartitem->model->price
            ]);
            $cartitem->model->where('id', $cartitem->model->id)->decrement('stock_quantity', $cartitem->qty);
        }
        return $order;
    }

    public function codOrder()
    {
        $this->paymenttype = 'Tiền mặt';
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::destroy();
            session()->flash('message', 'Đã đặt hàng thành công!');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã đặt hàng thành công',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xảy ra lỗi. Xin vui lòng thử lại sau',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalAmount()
    {
        $this->totalAmount = Cart::subtotal(0, ',', '.');
        return $this->totalAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone_number;
        $this->totalAmount = $this->totalAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalAmount' => $this->totalAmount
        ]);
    }
}
