<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     *后台登录
     */
    public function login()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(['username'=>$username,'password'=>$password],true)){
            return response()->json([
                'code'=>'200'
            ]);
        }
        return responseJson(500,null,'用户名或密码错误！');
    }
}
