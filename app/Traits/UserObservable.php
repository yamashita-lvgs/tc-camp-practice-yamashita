<?php
namespace App\Traits;

use App\Observers\UserObserver;

/**
 * ユーザーのトレイト
 */
trait UserObservable
{
    /**
     * ユーザーのイベント発生のトレイト
     */
    public static function bootUserObservable()
    {
        self::observe(UserObserver::class);
    }
}
