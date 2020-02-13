<?php
namespace App\Providers;

use App\Http\Validators\RuleValidator;
use Illuminate\Support\ServiceProvider;

/**
 * バリデーター固有のサービスクラス
 * @package App\Providers
 */
class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * バリデーションの拡張
     * return array 拡張バリデーションをインスタンス化した値
     */
    public function boot(): array
    {
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $attributes) {
            return new RuleValidator($translator, $data, $rules, $messages, $attributes);
        });
    }

    public function register()
    {
    }
}
