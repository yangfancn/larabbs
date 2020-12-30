<?php
namespace App\Handlers;

use Illuminate\Support\Str;

class ImageUploadHandler
{
    protected $allow_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $file_prefix)
    {
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());
        $upload_path = public_path() . '/' . $folder_name;
        //获取文件后缀
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        //拼接文件名
        $file_name = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;
        //判读是否为允许的文件
        if (!in_array($extension, $this->allow_ext)) {
            return false;
        }

        //移动到保存目录
        $file->move($upload_path, $file_name);

        return [
            'path' => config('app.url') . "/$folder_name/$file_name",
        ];
    }
}
