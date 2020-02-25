<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * 認証に関するコントローラークラス
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * ユーザーログイン画面表示
     * @return ユーザーログイン画面
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * ユーザーログイン認証
     * @param $request 入力された値
     * @return ユーザーログイン画面|一覧画面
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validated('login_id', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            $message = 'ログインID・パスワードが一致しません。';
            return view('auth.login', compact('message'));
        }
    }
}
