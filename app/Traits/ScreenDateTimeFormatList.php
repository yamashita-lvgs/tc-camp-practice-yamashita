<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * 年月日時間表示に関するトレイト
 */
trait ScreenDateTimeFormatList
{
    /**
     * 画面表示用登録日時のアトリビュート定義
     * @return 画面表示用登録日時
     */
    public function getCreatedAtScreenAttribute()
    {
        return $this->created_at->format(SCREEN_DATE_TIME_FORMAT);
    }

    /**
     * 画面表示用更新日時のアトリビュート定義
     * @return 画面表示用更新日時
     */
    public function getUpdatedAtScreenAttribute()
    {
        return $this->updated_at->format(SCREEN_DATE_TIME_FORMAT);
    }
}
