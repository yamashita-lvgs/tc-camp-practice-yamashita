<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * アプリケーション固有のサービスクラス
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    /**
     * バリデーションの拡張
     */
    public function boot()
    {
        Validator::extend('katakana', 'App\Http\Validators\RuleValidator@validateKatakana');
        Validator::extend('halfWidthCharacter', 'App\Http\Validators\RuleValidator@validateHalfWidthCharacter');
    }
}
