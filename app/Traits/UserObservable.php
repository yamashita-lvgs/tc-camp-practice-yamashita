<?php
namespace App\Traits;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Model;

trait UserObservable
{
    public static function bootUserObservable()
    {
        self::observe(UserObserver::class);
    }
}
