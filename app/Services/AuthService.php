<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * 認証のサービスクラス
 * @package App\Services
 */
class AuthService
{
    /**
     * ログインしたユーザーのセッション登録
     * @param string $loginId セッション登録するログインID
     */
    public static function insertLoginUser(string $loginId)
    {
        $userId = User::where('login_id', $loginId)->get()->first()->id;
        session(['user_id' => $userId]);
    }

    /**
     * ログアウトしたユーザーのセッション削除
     */
    public static function ejectLogoutUser()
    {
        session()->flush();
    }
}
