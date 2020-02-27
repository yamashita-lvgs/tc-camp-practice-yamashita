<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use Illuminate\Database\Eloquent\Collection;

/**
 * ログインテーブルのモデルクラス
 * @package App\Models
 */
class LoginHistory extends BaseModel
{
    use ScreenDateTimeFormat;

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
     * @param $loginHistory 登録するログイン履歴
     */
    //TODO user_id,created_user_id,updated_user_idは機能開発中のためどのユーザーが操作したかわかるまで1そ暫定的に入れています。;
    public static function insertHistory(int $loginStatus)
    {
        $loginHistory = new LoginHistory;
        $loginHistory->user_id = 2;
        $loginHistory->status_id = $loginStatus;
        $loginHistory->status_changed_at = now();
        $loginHistory->created_user_id = 2;
        $loginHistory->updated_user_id = 2;
        $loginHistory->save();
    }
}
