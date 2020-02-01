<?php
namespace App\Services;

use App\Models\Action;
use App\Models\User;
use App\Models\UserActionHistory;
use Illuminate\Support\Facades\DB;

/**
 * ユーザーのサービスクラス
 * @package App\Services
 */
class UserService
{
    public static function getUser()
    {
        return User::all();
    }
    public static function getUserActionHistory()
    {
        return UserActionHistory::all();
    }


}
