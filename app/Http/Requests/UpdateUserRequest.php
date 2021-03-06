<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'surname' => [
                'required',
                'min:2',
                'max:32',
            ],
            'name'    => [
                'required',
            ],
            'email'   => [
                'required',
            ],
            'phone'   => [
                'max:10',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }
}
