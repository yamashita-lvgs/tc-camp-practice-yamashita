<?php
namespace App\Traits;

use App\Observers\BaseModelObserver;

/**
 * ベースモデル用のトレイト
 */
trait BaseModelObservable
{
    public static function bootBaseModelObservable()
    {
        self::observe(BaseModelObserver::class);
    }
}
