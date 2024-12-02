<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }
    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }
    public function AdminLoginSubmit(Request $request)
    {

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

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'ログアウトしました');
    }

    public function AdminForgetPassword()
    {
        return view('admin.forget_password');
    }

    public function AdminPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
        ]);

        $admin_data = Admin::where('email', $request->email)->first();

        $token = Str::random(64);
        $admin_data->token = Hash::make($token); // データベースに保存する際にハッシュ化
        $admin_data->update();
        $reset_link = url('admin/reset-password/' . $token);
        $subject = "パスワードのリセット";

        try {
            // メールを送信
            Mail::to($request->email)->send(new Websitemail($subject, $reset_link));
        } catch (\Exception $e) {
            // エラーをログに記録
            \Log::error('メール送信エラー: ' . $e->getMessage());
            return redirect()->back()->with('error', 'メールの送信中にエラーが発生しました。');
        }

        return redirect()->back()->with('success', 'パスワードリセットメールをメールアドレスに送信しました。');
    }
}