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
    public function boot()
    {
        Validator::extend('katakana', 'App\Http\Validators\RuleValidator@validateKatakana');
        Validator::extend('eachIncludingHalfWidthCharacter', 'App\Http\Validators\RuleValidator@validateEachIncludingHalfWidthCharacter');
    }
}
