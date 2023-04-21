<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }

    // Relationship to Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'shipping_address');
    }

    // Relationship to ShippingMethod
    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method');
    }
}
