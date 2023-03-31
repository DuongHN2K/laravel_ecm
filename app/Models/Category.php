<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Relationship to Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    // Relationship to Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relationship to Sub categories
    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
