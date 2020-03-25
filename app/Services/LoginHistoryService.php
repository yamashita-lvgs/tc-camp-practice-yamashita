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
     * @return LoginHistory 登録したログイン履歴インスタンス
     */
    //TODO ログインしたユーザーIDはあとで正式なものをいれる
    public static function insertLoginHistory()
    {
        $userId = 2;
        LoginHistory::insertHistory(LOGIN_STATUS_LOGIN, $userId);
    }

    /**
     * ログアウト履歴登録
     * @return LoginHistory 登録したログイン履歴インスタンス
     */
    //TODO ログアウトしたユーザーIDはあとで正式なものをいれる
    public static function insertLogoutHistory()
    {
        $userId = 3;
        LoginHistory::insertHistory(LOGIN_STATUS_LOGOUT, $userId);
    }

    /**
     * 保存期間超過のログを物理削除
     */
    public static function physicalDeletePeriodExceededLogs(): User
    {
        LoginHistory::physicalDeletePeriodExceededLogs();
    }
}
