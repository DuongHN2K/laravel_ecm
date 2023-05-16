<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $trendingProducts = Product::where('trending', '1')->latest()->take(8)->get();
        $newArrivals = Product::latest()->take(8)->get();
        return view('frontend.index', compact('trendingProducts', 'newArrivals'));
    }

    public function newArrivals()
    {
        $newArrivals = Product::latest()->take(12)->get();
        return view('frontend.pages.new-arrival', compact('newArrivals'));
    }

    public function trendings()
    {
        $trendingProducts = Product::where('trending', '1')->latest()->get();
        return view('frontend.pages.trending', compact('trendingProducts'));
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

    public function productShow(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if($category)
        {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product)
            {
                return view('frontend.collections.product.show', compact('product', 'category'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function thankYou()
    {
        return view('frontend.checkout.thank-you');
    }
}
