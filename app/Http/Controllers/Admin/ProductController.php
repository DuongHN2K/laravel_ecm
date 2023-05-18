<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orderCount = 1;
        $product = Product::all();
        return view('admin.product.index', compact('product', 'orderCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::where('status', '0')->get();
        $brand = Brand::where('status', '0')->get();
        // $discount = Discount::where('status', '0')->get();
        $discount = Discount::all();
        return view('admin.product.create', compact('category', 'brand', 'discount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        //
        $data = $request->validated();
        $product = new Product();
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];
        $product->description = $data['description'];
        if($request->hasFile('thumbnail'))
        {
            $tn_upload_path = 'images/products/thumbnail/';
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $tn_filename = time() . '.' . $extension;
            $file->move($tn_upload_path, $tn_filename);
            $product->thumbnail = $tn_filename;
        }
        $images = array();
        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $file) {
                $img_upload_path = 'images/products/product_images/';
                $img_name = md5(rand(1000, 10000));
                $extension = $file->getClientOriginalExtension();
                $img_filename = $img_name . '.' . $extension;
                $file->move($img_upload_path, $img_filename);
                $images[] = $img_filename;
            }
        }
        $product->images = implode("|", $images);
        $product->price = $data['price'];
        $product->stock_quantity = $data['stock_quantity'];
        $product->discount_id = $data['discount'];
        $product->status = $request->status == true ? '1':'0';
        $product->trending = $request->trending == true ? '1':'0';
        $product->created_by = Auth::user()->id;
        $product->save();
        return redirect('admin/products')->with('message', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($product_id)
    {
        //
        $product = Product::find($product_id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_id)
    {
        //
        $product = Product::find($product_id);
        $category = Category::where('status', '0')->get();
        $brand = Brand::where('status', '0')->get();
        // $discount = Discount::where('status', '0')->get();
        $discount = Discount::all();
        return view('admin.product.edit', compact('product', 'category', 'brand', 'discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, $product_id)
    {
        //
        $data = $request->validated();
        $product = Product::find($product_id);
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];
        $product->description = $data['description'];
        if($request->hasFile('thumbnail'))
        {
            $tn_upload_path = 'images/products/thumbnail/';
            $tn_dest = 'images/products/thumbnail/' . $product->thumbnail;
            if(File::exists($tn_dest))
            {
                File::delete($tn_dest);
            }
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $tn_filename = time() . '.' . $extension;
            $file->move($tn_upload_path, $tn_filename);
            $product->thumbnail = $tn_filename;
        }
        $cur_images = $product->images;
        $images = array();
        if($request->hasFile('images'))
        {
            $img_files = explode("|", $product->images);
            foreach ($img_files as $old_file)
            {
                $img_dest = 'images/products/product_images/' . $old_file;
                if(File::exists($img_dest))
                {
                    File::delete($img_dest);
                }
            }
            foreach ($request->file('images') as $file) {
                $img_upload_path = 'images/products/product_images/';
                $img_name = md5(rand(1000, 10000));
                $extension = $file->getClientOriginalExtension();
                $img_filename = $img_name . '.' . $extension;
                $file->move($img_upload_path, $img_filename);
                $images[] = $img_filename;
            }
            $product->images = implode('|', $images);
        }
        else
        {
            $product->images = $cur_images;
        }
        $product->price = $data['price'];
        $product->stock_quantity = $data['stock_quantity'];
        $product->discount_id = $data['discount'];
        $product->status = $request->status == true ? '1':'0';
        $product->trending = $request->trending == true ? '1':'0';
        $product->created_by = Auth::user()->id;
        $product->save();
        return redirect('admin/products')->with('message', 'Cập nhật thông tin sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        //
        $product = Product::find($product_id);
        if ($product)
        {
            $thumbnail_dest = 'images/products/thumbnail/' . $product->thumbnail;
            if(File::exists($thumbnail_dest))
            {
                File::delete($thumbnail_dest);
            }
            $img_files = explode("|", $product->images);
            foreach ($img_files as $file)
            {
                $img_dest = 'images/products/product_images/' . $file;
                if(File::exists($img_dest))
                {
                    File::delete($img_dest);
                }
            }
            $product->delete();
            return redirect('admin/products')->with('message', 'Xóa sản phẩm thành công');
        }
        else
        {
            return redirect('admin/products')->with('message', 'Không có id nào');
        }
    }
}
