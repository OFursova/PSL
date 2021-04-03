<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactUsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.auth()->user()->id,
            'phone' => 'nullable|string|unique:users,phone,'.auth()->user()->id,
            'address' => 'nullable|string',
            'role_id' => 'nullable|numeric|exists:roles,id',
            'caseName' => 'nullable|string',
            'description' => 'nullable|string',
            'attachment' => 'nullable',
            'spec' => 'nullable',
            'lawyer' => 'nullable'
        ];
    }
}
