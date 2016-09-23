<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $rules = [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
//            'role_id' => 'required'
        ];

        if (request('id','')) {
            $rules['username'] = 'required|unique:users,username,'.$this->id;
        }else{
            $rules['username'] = 'required|unique:users,username';
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'username.required' => '登录名不能为空',
            'username.unique' => '登录名不能重复',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'password.required' => '密码不能为空',
            'password.confirmed' => '两次密码输入不一致。',
            'password_confirmation.required' => '确认密码不能为空',
//            'role_id.required' => '请选择角色',
        ];
    }
}
