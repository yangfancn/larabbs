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
            'avatar' => 'mimes:png,jpg,jpeg,gif,bmp|dimensions:min_width=208,min_height=208',
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
            'avatar.mimes' => '头像格式必须为 jpeg, bmp, png, gif',
            'avatar.dimensions' => '图片最小分辨率为 208px * 208px',
        ];
    }
}
