<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $imagerules = request()->isMethod('PUT') ? 'nullable' : 'required';
        $rules = [
            'category' => [
                'required',
                'integer'
            ],
            'brand' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
                'required',
                'string'
            ],
            'thumbnail' => [
                $imagerules,
                'mimes:jpeg,jpg,png'
            ],
            'images' => $imagerules,
            'images.*' => 'mimes:jpeg,jpg,png',
            'stock_quantity' => [
                'required',
                'integer'
            ],
            'price' => [
                'required',
                'integer'
            ],
            'discount' => [
                'nullable',
                'integer'
            ],
            'trending' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Trường tên không được để trống',
            'slug.required' => 'Trường slug không được để trống',
            'description.required' => 'Trường mô tả không được để trống',
            'stock_quantity.required' => 'Trường số lượng không được để trống',
            'price.required' => 'Trường giá không được để trống',
            'thumbnail.required' => 'Ảnh đại diện là bắt buộc khi tạo sản phẩm mới',
            'thumbnail.mimes' => 'Bạn phải chọn định dạng jpeg, jpg, hoặc png',
            'images.required' => 'Ảnh sản phẩm là bắt buộc khi tạo sản phẩm mới',
            'images.*.mimes' => 'Bạn phải chọn định dạng jpeg, jpg hoặc png'
        ];
        return $messages;
    }
}
