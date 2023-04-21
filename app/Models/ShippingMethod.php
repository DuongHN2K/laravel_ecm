<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    // Relationship to OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'shipping_method');
    }
}
