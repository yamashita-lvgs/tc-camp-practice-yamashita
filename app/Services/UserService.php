<?php
namespace App\Services;

use App\Models\Action;
use App\Models\User;
use App\Models\UserOperationHistory;
use Illuminate\Supportt\Facades\DB;
use Illuminate\Support\Collection;

/**
 * ユーザーコントローラで用いるサービスクラス
 * @package App\Services
 */
class UserService
{
    /**
     * ユーザー一覧画面表示
     * @return 全ユーザー
     */
    public static function getUsers()
    {
        return User::orderBy('id')->take(config('const.HISTORY_COUNT'))->get();
    }

    /**
     * ユーザー一覧画面表示
     * @return 全ユーザー情報操作履歴
     */
    public static function getUserOperationHistories()
    {
        return UserOperationHistory::orderBy('operated_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }
}
