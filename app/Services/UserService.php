<?php
namespace App\Services;

use App\Models\Action;
use App\Models\User;
use App\Models\UserActionHistory;
use Illuminate\Support\Facades\DB;

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
        return User::all();
    }

    /**
     * ユーザー一覧画面表示
     * @return 全ユーザー情報操作履歴
     */
    public static function getUserOperationHistories()
    {
        return UserOperationHistory::all();
    }
}
