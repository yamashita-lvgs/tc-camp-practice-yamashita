<?php
namespace App\Http\Middleware;

use Closure;

/**
 * ユーザーのログインセッションに関するコントローラークラス
 * @package App\Http\Controllers
 */
class UserLoginSession
{
    /**
     * ログイン済みのユーザーか判定
     * @return 認証結果（ログイン済みのユーザー：入力されたURLの画面、ログインしていないユーザー：ログイン画面）
     */
    public function handle($request, Closure $next)
    {
        return (session()->has('user_id') ? $next($request) : redirect('login'));
    }
}
