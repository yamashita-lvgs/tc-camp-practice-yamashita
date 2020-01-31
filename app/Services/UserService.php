<?php
namespace App\Services;

use App\Models\User;
use App\Models\UserActionHistory;
use Illuminate\Support\Facades\DB;

/**
 * ユーザーテーブルのサービスクラス
 * @package App\Services
 */
class UserService
{
    public static function userIndex()
    {
        return User::all();
    }

    public static function userActionHistoryIndex()
    {
        return UserActionHistory::all();
    }
}
