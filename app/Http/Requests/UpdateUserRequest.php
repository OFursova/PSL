<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|unique:users,email,'.$this->id,
            'password' => 'nullable',
            'avatar' => 'nullable',
            'phone' => 'nullable|string|unique:users,phone,'.$this->id,
            'address' => 'nullable|string',
            'role_id' => 'nullable|numeric|exists:roles,id',
            'position_id' => 'nullable|numeric|exists:positions,id'
        ];
    }
}
