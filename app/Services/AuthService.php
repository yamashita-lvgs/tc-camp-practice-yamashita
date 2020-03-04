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
    public static function insertLoginUser(string $loginId)
    {
        $userId = User::where('login_id', $loginId)->get()->first()->id;
        session(['user_id' => $userId]);
    }

    public static function ejectLogoutUser()
    {
        session()->flush();
    }
}
