<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function AdminLogin(){
        return view('admin.login');
    }
    public function AdminDashboard(){
        return view('admin.admin_dashboard');
    }
    public function AdminLoginSubmit(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // 認証失敗時
            return back()->withErrors(['email' => 'メールアドレスまたはパスワードが間違っています'])->withInput();
        }

        // 認証成功時
        return redirect()->route('admin.dashboard')->with('success', 'ログインに成功しました');

    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','ログアウトしました');
    }
}
