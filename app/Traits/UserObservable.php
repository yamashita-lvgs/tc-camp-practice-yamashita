<?php
namespace App\Traits;

use App\Observers\UserObserver;

/**
 * ユーザーモデル用のトレイト
 */
trait UserObservable
{
    /**
     * UserObserverクラスをロード
     */
    public static function bootUserObservable()
    {
        self::observe(UserObserver::class);
    }
}
