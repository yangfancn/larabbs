<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'introduction' => 'max:80',
        ];
    }

    /**
     * Error messages
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => '用户名已被使用',
            'name.regex' => '用户名只支持英文、数字、横杠和下划线',
            'name.between' => '用户名长度介于3-25',
            'name.required' => '用户名不能为空',
        ];
    }
}
