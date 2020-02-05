<?php
namespace App\Models;

use App\Traits\TimestampScreen;
use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー操作履歴テーブルのモデルクラス
 * @package App\Models
 */
class UserOperationHistory extends Model
{
    /**
     * 操作日時を日付のカラムだと認識させる
     */
    protected $dates = [
        'operated_at',
    ];

    use TimestampScreen;

    public function operated_user()
    {
        return $this->belongsTo(User::class, 'operated_user_id');
    }

    public function operating_user()
    {
        return $this->belongsTo(User::class, 'operating_user_id');
    }

    /**
     * 全操作項目の取得
     * @return 取得した全操作項目
     */
    public function getOperationNameAttribute()
    {
        return OPERATION_TYPE_LIST[$this->operation_id];
    }

    /**
     * 最新のユーザー操作履歴取得
     * @return 最新のユーザー情報操作履歴
     */
    public static function getLatestUserOperationHistories()
    {
        return self::orderBy('operated_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }
}
