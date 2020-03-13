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
    public static function insertLoginUserSession(string $loginId)
    {
        $userId = User::getUserByLoginId($loginId)->id;
        session(['user_id' => $userId]);
    }

    /**
     * ログアウトしたユーザーのセッション削除
     * @param int $loginId セッション削除するユーザーID
     */
    public static function ejectLogoutUserSession(int $userId)
    {
        session()->forget(['user_id' => $userId]);
    }
}
