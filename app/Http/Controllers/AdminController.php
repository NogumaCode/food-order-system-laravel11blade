<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Rules\ContainsLetter;
use App\Rules\ContainsNumber;
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
        return view('admin.index');
    }
    public function AdminLoginSubmit(Request $request)
    {

        // バリデーション処理
        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                new ContainsLetter,
                new ContainsNumber,
            ],
        ]);

        // ログインデータ
        $credentials = $request->only('email', 'password');

        // 認証を試みる
        if (!Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors(['email' => 'メールアドレスまたはパスワードが間違っています'])->withInput();
        }

        // セッション固定攻撃を防止
        $request->session()->regenerate();

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

        // 平文トークンを生成
        $plain_token = Str::random(64);

        // ハッシュ化して保存
        $admin_data->token = Hash::make($plain_token);
        $admin_data->token_created_at = now();
        $admin_data->update();

        // リセットリンクに平文トークンを使用
        $reset_link = route('admin.reset_password', ['token' => $plain_token]);
        $subject = "パスワードのリセット";

        try {
            Mail::to($request->email)->send(new Websitemail($subject, $reset_link));
        } catch (\Exception $e) {
            \Log::error('メール送信エラー: ' . $e->getMessage());
            return redirect()->back()->with('error', 'メールの送信中にエラーが発生しました。');
        }

        return redirect()->back()->with('success', 'パスワードリセットメールをメールアドレスに送信しました。');
    }

    public function AdminResetPassword($token)
    {
        // トークンがある管理者を取得
        $admin_data = Admin::whereNotNull('token')
        ->where('token_created_at', '>=', now()->subMinutes(30))
        ->first();

        // トークンが一致するか検証
        if (!$admin_data || !Hash::check($token, $admin_data->token)) {
            return redirect()->route('admin.login')->with('error', '認証が異なっております');
        }

        return view('admin.reset_password', compact('token'));
    }
    public function AdminResetPasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:7',
                new ContainsLetter,
                new ContainsNumber,
            ],
            'password_confirmation' => 'required|same:password',
        ]);

        $admin_data = Admin::where('token', '!=', null)->where('token_created_at', '>=', now()->subMinutes(30))->first();

        // トークンの存在を確認
        if (!$admin_data || !Hash::check($request->token, $admin_data->token)) {
            return redirect()->route('admin.login')->with('error', 'トークンが無効です');
        }
        // トークンの有効期限を確認
        if ($admin_data->token_created_at < now()->subMinutes(30)) {
            return redirect()->route('admin.login')->with('error', 'トークンの有効期限が切れています');
        }
        // パスワードを更新
        $admin_data->password = Hash::make($request->password);
        // トークンを無効化
        $admin_data->token = null;
        $admin_data->token_created_at = null;

        // データベースを更新
        $admin_data->update();

        // ログインフォームにリダイレクト
        return redirect()->route('admin.login')->with('success', 'パスワードをリセットしました');
    }

    public function AdminProfile(){
        $id = Auth::guard('admin')->id();
        if (!$id) {
            return redirect()->route('admin.login')->with('error', 'セッションが切れました。ログインしてください。');
        }

        $profileData = Admin::find($id);

        if (!$profileData) {
            return redirect()->route('admin.dashboard')->with('error', 'プロフィールデータが見つかりません。');
        }

        return view('admin.admin_profile', compact('profileData'));
        }
}