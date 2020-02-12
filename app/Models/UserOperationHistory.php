<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormat;
use Illuminate\Database\Eloquent\Collection;

/**
 * ユーザー操作履歴テーブルのモデルクラス
 * @package App\Models
 */
class UserOperationHistory extends BaseModel
{
    /**
     * 日時分漢字表示のフォーマット
     */
    use ScreenDateTimeFormat;

    protected $dates = [
        'operated_at',
    ];

    public function operated_user()
    {
        return $this->belongsTo(User::class, 'operated_user_id');
    }

    public function operating_user()
    {
        return $this->belongsTo(User::class, 'operating_user_id');
    }

    /**
     * 該当する操作項目のアトリビュート定義
     * @return 該当する操作項目
     */
    public function getOperationTypeNameAttribute()
    {
        return OPERATION_TYPE_NAME_LIST[$this->operation_id];
    }

    /**
     * 画面表示用操作日時のアトリビュート定義
     * @return String 画面表示用操作日時
     */
    public function getOperatedAtScreenAttribute(): String
    {
        return $this->operated_at->format(SCREEN_DATE_TIME_FORMAT);
    }

    /**
     * 最新のユーザー操作履歴取得
     * @return Collection 最新のユーザー情報操作履歴
     */
    public static function getScreenLatestUserOperationHistories(): Collection
    {
        return self::orderBy('operated_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }

    /**
     * ユーザー操作履歴登録
     * @param $attribute ユーザー操作履歴
     */
    public static function createUserOperationHistory(array $attribute)
    {
        UserOperationHistory::create($attribute);
    }
}
