<?php
namespace App\Providers;

use App\Http\Validators\RuleValidator;
use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * バリデーター初期処理のクラス
 * @package App\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * サービスプロバイダー読み込み後のメソッド
     */
    public function boot()
    {
        Validator::extend('katakana', 'App\Http\Validators\RuleValidator@validateKatakana');
        Validator::extend('halfWidthCharacter', 'App\Http\Validators\RuleValidator@validateHalfWidthCharacter');
    }


    public function register()
    {
    }
}
