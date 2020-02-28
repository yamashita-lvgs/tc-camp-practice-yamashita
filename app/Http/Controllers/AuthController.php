<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use App\Services\LoginHistoryService;
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
     * @param $request リクエスト情報
     * @return トップ画面
     */
    public function postLogin(AuthRequest $request)
    {
        DB::transaction(function ($request) {
            AuthService::insertLoginUser($request->input('login_id'));
            LoginHistoryService::insertLoginHistory();
        });
        return redirect('/');
    }

    /**
     * ログアウト処理
     * @return ログイン画面
     */
    public function postLogout()
    {
        DB::transaction(function () {
            LoginHistoryService::insertLogoutHistory();
        });
        return redirect('login');
    }
}
