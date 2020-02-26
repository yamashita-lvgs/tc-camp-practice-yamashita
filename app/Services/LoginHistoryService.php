<?php
namespace App\Services;

use App\Models\LoginHistory;
use Illuminate\Database\Eloquent\Collection;

/**
 * ログイン履歴のサービスクラス
 * @package App\Services
 */
class LoginHistoryService
{
    /**
     * 表示用最新のログイン履歴取得
     * @return Collection 表示用最新のログイン履歴
     */
    public static function getScreenLatestLoginHistories(): Collection
    {
        return LoginHistory::getLatestLoginHistories();
    }

    /**
     * ログイン履歴登録
     * @param int $loginStatus 登録するログイン状態の種別番号
     * @return LoginHistory 登録したログイン履歴インスタンス
     */
    public static function insertLoginHistory(int $loginStatus): LoginHistory
    {
        return LoginHistory::insertLoginHistory($loginStatus);
    }
}
