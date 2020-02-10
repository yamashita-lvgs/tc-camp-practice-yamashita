<?php
namespace App\Traits;

use App\Observers\UserObserver;

/**
 * ユーザーのトレイト
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
