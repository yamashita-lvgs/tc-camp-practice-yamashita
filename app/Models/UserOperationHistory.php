<?php
namespace App\Models;

use App\Traits\ScreenDateTimeFormatList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * ユーザー操作履歴テーブルのモデルクラス
 * @package App\Models
 */
class UserOperationHistory extends Model
{
    protected $dates = [
        'operated_at',
    ];

    use ScreenDateTimeFormatList;

    public function operated_user()
    {
        return $this->belongsTo(User::class, 'operated_user_id');
    }

    public function operating_user()
    {
        return $this->belongsTo(User::class, 'operating_user_id');
    }

    /**
     * 該当する操作項目の取得
     * @return 該当する操作項目
     */
    public function getOperationTypeNameAttribute()
    {
        return OPERATION_TYPE_LIST[$this->operation_id];
    }

    /**
     * 最新のユーザー操作履歴取得
     * @return collection 最新のユーザー情報操作履歴
     */
    public static function getLatestUserOperationHistories() :collection
    {
        return self::orderBy('operated_at', 'desc')->take(config('const.HISTORY_COUNT'))->get();
    }

    /**
     * 画面表示用操作日時のアトリビュート定義
     * @return string 画面表示用操作日時
     */
    public function getOperatedAtScreenAttribute() :string
    {
        return $this->operated_at->format(SCREEN_DATE_TIME_FORMAT);
    }
}
