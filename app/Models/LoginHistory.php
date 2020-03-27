<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * ログイン履歴テーブルのモデルクラス
 * @package App\Models
 */
class LoginHistory extends BaseModel
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'status_changed_at',
    ];

    /**
     * ログイン状態名のアトリビュート定義
     * @return string ログイン状態名
     */
    public function getLoginStatusNameAttribute(): string
    {
        return LOGIN_STATUS_LIST[$this->status_id];
    }

    /**
     * 画面表示用ログイン変更日時のアトリビュート定義
     * @return string 画面表示用ログイン変更日時
     */
    public function getStatusChangedAtScreenAttribute(): string
    {
        return $this->status_changed_at->format(SCREEN_DATE_TIME_FORMAT);
    }

    /**
     * 最新のログイン履歴取得
     * @return Collection 最新のログイン履歴
     */
    public static function getLatestLoginHistories(): Collection
    {
        return self::orderBy('status_changed_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }

    /**
     * ログイン履歴登録
     * @param int $loginStatus ログイン状態
     * @param int $userId ユーザーID
     */
    public static function insertHistory(int $loginStatus, int $userId)
    {
        $loginHistory = new LoginHistory;
        $loginHistory->user_id = $userId;
        $loginHistory->status_id = $loginStatus;
        $loginHistory->status_changed_at = now();
        $loginHistory->save();
    }

    /**
     * 保存期間超過のログを物理削除
     */
    public static function physicalDeletePeriodExceededLogs()
    {
        $deleteLoginHistoryCount = config('const.DELETE_LOGIN_HISTORY_COUNT');
        $deleteLoginHistoryPriod = date("Y-m-d H:i:s", strtotime($deleteLoginHistoryCount.'day'));
        //TODO 下記どちらかみたいな実装で物理削除したいがcreated_atと$deleteLoginHistoryPriodの比較ができない。
        User::where('created_at' < $deleteLoginHistoryPriod)->forceDelete();
        User::where(strtotime('created_at') < strtotime($deleteLoginHistoryPriod))->forceDelete();
    }
}
