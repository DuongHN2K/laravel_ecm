<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            //
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
            'parent_category' => [
                'sometimes',
                'nullable',
                'numeric'
            ],
            'thumbnail' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'navbar_status' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ]
        ];
        return $rules;
    }
}
