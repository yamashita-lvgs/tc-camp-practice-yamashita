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
     * @return 認証結果（true：入力されたURLの画面、false：ログイン画面）
     */
    public function handle($request, Closure $next)
    {
        if ( !session()->has('user_id') ) {
            return redirect('login');
        }

        return $next($request);
    }
}
