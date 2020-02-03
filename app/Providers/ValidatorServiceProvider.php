<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use App\Http\Validators\RuleValidator;

    class ValidatorServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap services.
         *
         * @return void
         */
        public function boot()
        {
            $this->app['validator']->resolver(function($translator, $data, $rules, $messages, $attributes) {
                return new RuleValidator($translator, $data, $rules, $messages, $attributes);
            });
        }

        /**
         * Register services.
         *
         * @return void
         */
        public function register()
        {
            //
        }
    }
