<?php
namespace App\Services;

use App\Models\UserLoginHistory;
use Illuminate\Database\Eloquent\Collection;

/**
 * ユーザーログイン履歴のサービスクラス
 * @package App\Services
 */
class UserLoginHistoryService
{
    /**
     * 表示用最新のユーザーログイン履歴取得
     * @return Collection 表示用最新のユーザーログイン履歴
     */
    public static function getScreenLatestUserLoginHistories(): Collection
    {
        return UserLoginHistory::getLatestUserLoginHistories();
    }
}
