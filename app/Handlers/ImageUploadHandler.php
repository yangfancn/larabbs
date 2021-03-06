<?php
namespace App\Handlers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    protected $allow_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
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

        //图片裁剪
        if ($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path . '/' . $file_name, $max_width);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$file_name",
        ];
    }

    public function reduceSize($file_path, $max_width)
    {
        $image = Image::make($file_path);


        $image->resize($max_width, null, function ($constraint) {
            //等比例缩放
            $constraint->aspectRatio();
            //防止裁剪时尺寸变大
            $constraint->upsize();
        });

        $image->save();
    }
}
