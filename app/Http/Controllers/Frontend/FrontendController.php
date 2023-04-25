<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('frontend.index');
    }

    public function categories()
    {
        $category = Category::where('status', '0')->where('parent_id', NULL)->get();
        return view('frontend.collections.category.index', compact('category'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category)
        {
            $product = $category->products()->get();
            return view('frontend.collections.product.index', compact('product', 'category'));
        }
        else
        {
            return redirect()->back();
        }
    }
}
