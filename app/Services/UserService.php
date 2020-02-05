<?php
namespace App\Services;

use App\Models\Action;
use App\Models\User;
use App\Models\UserOperationHistory;
use Illuminate\Supportt\Facades\DB;

/**
 * ユーザー情報と一覧とユーザー情報操作履歴のサービスクラス
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
        return User::getUsers();
    }

    /**
     * ユーザー操作履歴取得
     * @return 情報操作履歴
     */
    public static function getLatestUserOperationHistories()
    {
        return UserOperationHistory::getLatestUserOperationHistories();
    }
}

