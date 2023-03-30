<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship to Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Relationship to Discount
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }
}
