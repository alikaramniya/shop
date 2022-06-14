<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:30',
            'category_id' => 'required|integer|exists:App\Models\Category,id',
            'count' => 'required|integer|min:0',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|integer|min:1000',
            'demo' => 'required|string|max:200',
            'description' => 'required|string'
        ];
    }
}
