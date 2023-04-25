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
            'description' => [
                'required',
                'string'
            ],
            'thumbnail' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'images' => 'nullable',
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
}
