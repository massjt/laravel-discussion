<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    // 注册
    public function register()
    {
        return view('forum.users.register');
    }

    // 注册信息处理
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|unique:users|min:3',
            'email'  => 'required|email|unique:users',
            'password'  => 'required|min:6|confirmed',
            'password_confirmation'  => 'required|min:6',
        ]);
        // 保存用户数据
        $data = [
            'avatar' => 'https://lorempixel.com/256/256/?82796',
            'confirm_code' => str_random(48)
        ];
        $user = User::create(array_merge($request->all(),$data));
        // 发送邮件
        Mail::to($user)->send(new UserRegistered($user));
        return redirect('/');
    }

    /*
     * 邮箱验证
     * */
    public function confirmEmail($confirm_code)
    {
        $user = User::where('confirm_code', $confirm_code)->first();
        if (is_null($user)) {
            return redirect('/');
        }
        $user->is_confirmed = 1;
        // 防止再次点击同样的链接
        $user->confirm_code = str_random(48);
        $user->save();
        return redirect('/user/login');
    }
    /*
     * 用户登录
     * */
    public function login()
    {
        return view('forum.users.login');
    }
    /*
     * 处理用户登录
     * */
    public function signin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_confirmed' => 1])) {
            return redirect()->intended('/');
        }
        return redirect('/user/login')->withInput();
    }
    /*
     * 退出登录
     * */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
