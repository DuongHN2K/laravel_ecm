<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orderCount = 1;
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.orders.index', compact('orders', 'orderCount'));
    }

    public function show($orderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if ($order) 
        {
            return view('frontend.orders.show', compact('order'));
        } 
        else 
        {
            return redirect()->back()->with('message', 'Không tìm thấy đơn hàng nào');
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        $order->status_message = 'đã hủy';
        foreach ($order->orderItems as $orderitem) 
        {
            $orderitem->product->where('id', $orderitem->product_id)->increment('stock_quantity', $orderitem->quantity);
            $orderitem->update();
        }
        $order->update();
        return redirect()->back()->with('message', 'Đã hủy đơn hàng thành công');
    }
}
