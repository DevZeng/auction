<?php
/**
 * Created by PhpStorm.
 * User: devzeng
 * Date: 17-12-7
 * Time: 下午5:29
 */

if (!function_exists('responseJson')){
    function responseJson($code,$content=null,$message='')
    {
        if ($code!=200){
            return response()->json([
                'code'=>$code,
                'msg'=>$message
            ]);
        }
        return response()->json([
            'code'=>$code,
            'data'=>$content
        ]);
    }
};