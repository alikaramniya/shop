<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactInsertRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20', 'min:3'],
            'subject' => ['required', 'string', 'max:50', 'min:3'],
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'message' => ['required', 'string', 'max:200', 'min:3'],
            'website' => ['required', 'string', 'max:40', 'min:3']
        ];
    }
}
