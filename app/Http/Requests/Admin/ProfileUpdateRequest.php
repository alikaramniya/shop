<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'username' => 'required|string|max:30|min:3',
            'lastName' => 'required|string|max:30|min:3',
            'image'    => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'address'  => 'required|string'
        ];
    }
}
