<?php

namespace App\Services;

use App\Models\UserOperationHistory;
use Illuminate\Database\Eloquent\Collection;

/**
 * ユーザー操作履歴のサービスクラス
 * @package App\Services
 */
class UserOperationHistoryService
{
    /**
     * 表示用最新のユーザー情報操作履歴取得
     */
    public static function getScreenLatestUserOperationHistories()
    {
        return UserOperationHistory::getScreenLatestUserOperationHistories();
    }
}
