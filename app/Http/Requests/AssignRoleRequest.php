<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRoleRequest extends FormRequest
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
            'user' => 'required',
            'roles' => 'array|required'
        ];
    }

    public function messages() {
        return [
            'user.required' => 'User is required',
            'roles.required' => 'Roles is required'
        ];
    }
}
