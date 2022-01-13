<?php

namespace App\Providers;

use App\Interfaces\SmsInterface;
use App\Services\Messaging\TwilioSms;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SmsInterface::class, function () {
            $config = config('services.twilio');

            return new TwilioSms($config['account_sid'], $config['auth_token']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
