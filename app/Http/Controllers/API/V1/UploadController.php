<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    //
    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')){
            return response()->json([
                'return_code'=>'FAIL',
                'return_msg'=>'空文件'
            ]);
        }
        $file = $request->file('image');
//        dd($file);
        $name = $file->getClientOriginalName();
        $name = explode('.',$name);
        if (count($name)!=2){
            return response()->json([
                'return_code'=>'FAIL',
                'return_msg'=>'非法文件名'
            ]);
        }
        $allow = \config('fileAllow');
        if (!in_array($name[1],$allow)){
            return response()->json([
                'return_code'=>'FAIL',
                'return_msg'=>'不支持的文件格式'
            ]);
        }
        $md5 = md5_file($file);
        $name = $name[1];
        $name = $md5.'.'.$name;
        if (!$file){
            return response()->json([
                'return_code'=>'FAIL',
                'return_msg'=>'空文件'
            ]);
        }
        if ($file->isValid()){
            $destinationPath = 'uploads';
            $size = getimagesize($file);
            $thumb = Image::make($file)->resize($size[0]*0.3,$size[1]*0.3);
            $file->move($destinationPath,$name);
            $thumb->save($destinationPath.'/thumb_'.$name);
            return response()->json([
                'return_code'=>'SUCCESS',
                'data'=>[
                    'file_name'=>$name
                ]
            ]);
        }
    }
}
