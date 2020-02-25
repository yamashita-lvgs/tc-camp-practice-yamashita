<?php
namespace App\Traits;

use App\Observers\BaseModelObserver;

//TODO 操作ユーザー情報取得できたらこのファイル削除
/**
 * ベースモデル用のトレイト
 */
trait BaseModelObservable
{
    /**
     * BaseModelObserverクラスをロード
     */
    public static function bootBaseModelObservable()
    {
        self::observe(BaseModelObserver::class);
    }
}
