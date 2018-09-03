<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    EloquentUserRepository,
    EloquentArticleRepository
};
use App\Repositories\Contracts\{
    UserRepository,
    ArticleRepository
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
