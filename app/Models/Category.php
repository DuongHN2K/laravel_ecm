<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'navbar_status',
        'status',
        'created_by'
    ];

    // Relationship to Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest()->take(12);
    }

    // Relationship to Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    
    // Relationship to Sub categories
    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
