<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\DB;

/**
 * 認証に関するコントローラークラス
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * ログイン画面表示
     * @return ログイン画面
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * ログイン認証
     * @param $request 入力された値
     * @return トップ画面
     */
    public function postLogin(AuthRequest $request)
    {
        DB::transaction(function () {
            return LoginHistory::insertLoginHistory(LOGIN_STATUS_LOGIN);
        });
        return redirect()->intended('/');
    }

    /**
     * ログアウト処理
     * @return ログイン画面
     */
    public function postLogout()
    {
        DB::transaction(function () {
            return LoginHistory::insertLoginHistory(LOGIN_STATUS_LOGOUT);
        });
        return redirect('login');
    }
}
