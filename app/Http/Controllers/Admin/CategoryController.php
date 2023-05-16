<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.category.create', compact('category'));
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->parent_id = $data['parent_category'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        {
            $tn_upload_path = 'images/categories/';
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $tn_filename = time() . '.' . $extension;
            $file->move($tn_upload_path, $tn_filename);
            $category->thumbnail = $tn_filename;
        }
        $category->save();
        return redirect('admin/categories')->with('message', 'Tạo danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($category_id)
    {
        //
        $totalCategory= Category::where('status', '0')->where('id', '!=', $category_id)->get();
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category', 'totalCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, $category_id)
    {
        //
        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->parent_id = $data['parent_category'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        if($request->hasFile('thumbnail'))
        {
            $tn_upload_path = 'images/categories/';
            $tn_dest = 'images/categories/' . $category->thumbnail;
            if(File::exists($tn_dest))
            {
                File::delete($tn_dest);
            }
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $tn_filename = time() . '.' . $extension;
            $file->move($tn_upload_path, $tn_filename);
            $category->thumbnail = $tn_filename;
        }
        $category->save();
        return redirect('admin/categories')->with('message', 'Sửa thông tin danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id)
    {
        //
        $category = Category::find($category_id);
        if ($category)
        {
            $category->delete();
            return redirect('admin/categories')->with('message', 'Xóa danh mục thành công');
        }
        else
        {
            return redirect('admin/categories')->with('message', 'Không có id nào');
        }
    }
}
