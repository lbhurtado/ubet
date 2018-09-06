<?php

namespace App\Providers;

use Authy\AuthyApi;
use App\Services\Authy\AuthyService;
use Illuminate\Support\ServiceProvider;
use App\Services\Authy\Exceptions\InvalidTokenException;
use App\Services\Authy\Exceptions\RegistrationFailedException;
use App\Services\Authy\Exceptions\SmsRequestFailedException;

class AuthyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('authy', function () {
            $client = new AuthyApi(env('AUTHY_SECRET'));
            return new AuthyService($client);
        });
    }
}
