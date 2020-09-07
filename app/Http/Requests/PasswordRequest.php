<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class PasswordRequest extends FormRequest
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
            'oldpass' => 'required|password:admin',
            'password' => 'required|confirmed|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'oldpass.required' => '原密码不能为空',
            'oldpass.password' => '原密码不正确',
            'password.required' => '新密码不能为空',
            'password.confirmed' => '两次密码不一致',
            'password.min' => '密码长度最少6位',
            'password.max' => '密码长度最大32位',
        ];
    }
}
