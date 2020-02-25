<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use Illuminate\Database\Eloquent\Collection;

/**
 * ユーザーログインテーブルのモデルクラス
 * @package App\Models
 */
class UserLoginHistory extends BaseModel
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
    public function getLoginTypeNameAttribute(): string
    {
        return LOGIN_STATUS_LIST[$this->status_id];
    }

    /**
     * 画面表示用操作日時のアトリビュート定義
     * @return string 画面表示用操作日時
     */
    public function getStatusChangedAtScreenAttribute(): string
    {
        return $this->status_changed_at->format(SCREEN_DATE_TIME_FORMAT);
    }

    /**
     * 最新のユーザーログイン履歴取得
     * @return Collection 最新のユーザーログイン履歴
     */
    public static function getLatestUserLoginHistories(): Collection
    {
        return self::orderBy('status_changed_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }
}
