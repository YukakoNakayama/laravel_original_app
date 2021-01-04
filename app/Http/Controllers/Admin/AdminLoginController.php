<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    function showLoginForm()
    {
        return view('admin.admin_login');
    }

    function login(Request $request)
    {
        //入力内容をチェックする
        $admin_id = $request->input('admin_id');
        $password = $request->input('admin_password');
        //ログイン成功
        if($admin_id == 'admin_user' && $password == 'adminpass')
        {
            $request->session()->put('admin_auth', true);
            return redirect()->route('admin.index');
        }
        //ログイン失敗
        return redirect('admin/login')->withErrors([
            'login' => 'idまたはパスワードが違います'
        ]);
    }
}
