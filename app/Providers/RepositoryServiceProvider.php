<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    EloquentUserRepository,
    EloquentArticleRepository,
    EloquentAddressRepository,
    EloquentMessengerRepository
};
use App\Repositories\Contracts\{
    UserRepository,
    ArticleRepository,
    AddressRepository,
    MessengerRepository
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(ArticleRepository::class, EloquentArticleRepository::class);
        $this->app->bind(AddressRepository::class, EloquentAddressRepository::class);
        $this->app->bind(MessengerRepository::class, EloquentMessengerRepository::class);
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
