<?php

namespace App\Providers;

use App\Repositories\Eloquent\{EloquentRoleRepository,
    EloquentUserRepository,
    EloquentArticleRepository,
    EloquentAddressRepository,
    EloquentMessengerRepository,
    EloquentDiallingCodeRepository};
use App\Repositories\Contracts\{RoleRepository,
    UserRepository,
    ArticleRepository,
    AddressRepository,
    MessengerRepository,
    DiallingCodeRepository};
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
        $this->app->bind(RoleRepository::class, EloquentRoleRepository::class);
        $this->app->bind(ArticleRepository::class, EloquentArticleRepository::class);
        $this->app->bind(AddressRepository::class, EloquentAddressRepository::class);
        $this->app->bind(DiallingCodeRepository::class, EloquentDiallingCodeRepository::class);
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
