<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'postal_code',
        'address',
        'status_message',
        'payment_type',
        'payment_id'
    ];
}
