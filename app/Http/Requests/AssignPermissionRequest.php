<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionRequest extends FormRequest
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
            'role' => 'required',
            'permissions' => 'array|required'
        ];
    }

    public function messages() {
        return [
            'role.required' => 'Role name is required',
            'permissions.required' => 'Permissions is required'
        ];
    }
}
