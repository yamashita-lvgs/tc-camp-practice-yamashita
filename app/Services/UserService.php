<?php
namespace App\Services;

use App\Models\Action;
use App\Models\User;
use App\Models\UserOperationHistory;
use Illuminate\Supportt\Facades\DB;
use Illuminate\Support\Collection;

/**
 * ユーザーのサービスクラス
 * @package App\Services
 */
class UserService
{
    /**
     * 全ユーザー情報取得
     * @return 全ユーザー情報
     */
    public static function getUsers()
    {
        return User::orderBy('id')->get();
    }

    /**
     * ユーザー操作履歴取得
     * @return 直近10件の情報操作履歴
     */
    public static function getUserOperationHistories()
    {
        return UserOperationHistory::orderBy('operated_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }
}
