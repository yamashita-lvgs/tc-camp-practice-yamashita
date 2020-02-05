<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;

trait TimestampScreen
{
    /**
     * 画面表示する登録日時の定義
     * @return 画面表示する登録日時
     */
    public function getCreatedAtScreenAttribute($dateFormat)
    {
        $dateFormat = 'Y年m月d日 H時i分s秒';
        return $this->created_at->format($dateFormat);
    }

    /**
     * 画面表示する更新日時の定義
     * @return 画面表示する更新日時
     */
    public function getUpdatedAtScreenAttribute($dateFormat)
    {
        $dateFormat = 'Y年m月d日 H時i分s秒';
        return $this->updated_at->format($dateFormat);
    }
}
