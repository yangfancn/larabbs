<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|min:2|max:80',
                    'body' => 'required|min:3',
                    'category_id' => 'required|numeric'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题至少2个字符',
            'title.max' => '标题最多80个字符',
            'body.min' => '话题内容至少三个字符',
        ];
    }
}
