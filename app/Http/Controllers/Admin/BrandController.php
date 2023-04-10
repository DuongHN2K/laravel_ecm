<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BrandFormRequest;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand')); 
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandFormRequest $request)
    {
        $data = $request->validated();
        $brand = new Brand();
        $brand->name = $data['name'];
        $brand->navbar_status = $request->navbar_status == true ? '1':'0';
        $brand->status = $request->status == true ? '1':'0';
        $brand->created_by = Auth::user()->id;
        $brand->save();
        return redirect('admin/brands')->with('message', 'Tạo thương hiệu thành công');
    }

    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandFormRequest $request, $brand_id)
    {
        $data = $request->validated();
        $brand = Brand::find($brand_id);
        $brand->name = $data['name'];
        $brand->navbar_status = $request->navbar_status == true ? '1':'0';
        $brand->status = $request->status == true ? '1':'0';
        $brand->created_by = Auth::user()->id;
        $brand->update();
        return redirect('admin/brands')->with('message', 'Sửa thông tin thương hiệu thành công');
    }

    public function destroy($brand_id)
    {
        $brand = Brand::find($brand_id);
        if ($brand)
        {
            $brand->delete();
            return redirect('admin/brands')->with('message', 'Xóa thương hiệu thành công');
        }
        else
        {
            return redirect('admin/brands')->with('message', 'Không có id nào');
        }
    }
}
