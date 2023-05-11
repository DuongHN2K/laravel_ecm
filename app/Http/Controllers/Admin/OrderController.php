<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $todayDate = Carbon::now()->format('Y-m-d');

        $orders = Order::
        when($request->date != null,
        function ($q) use ($request)
        {
            return $q->whereDate('created_at', $request->date);
        },
        function ($q) use ($todayDate)
        {
            return $q->whereDate('created_at', $todayDate);
        })
        ->when($request->status != null,
        function ($q) use ($request)
        {
            return $q->where('status_message', $request->status);
        })
        ->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        //
        $order = Order::find($order_id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($order_id)
    {
        //
        $order = Order::find($order_id);
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id)
    {
        //
        $order = Order::find($order_id);
        if($order)
        {
            $order->status_message = $request->order_status;
            $order->update();
            return redirect('admin/orders/'.$order_id)->with('message', 'Cập nhật trạng thái đơn hàng thành công');
        }
    }
}
