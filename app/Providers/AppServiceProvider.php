<?php

namespace App\Providers;

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
        $this->registerRepositories();
    }

    public function registerRepositories() {

        $this->app->bind(
            \App\Repositories\ProductsRepositoryInterface::class,
            \App\Repositories\ProductsRepository::class
        );

        $this->app->bind(
            \App\Repositories\CategoriesRepositoryInterface::class,
            \App\Repositories\CategoriesRepository::class
        );

        $this->app->bind(
            \App\Repositories\UsersRepositoryInterface::class,
            \App\Repositories\UsersRepository::class
        );

        $this->app->bind(
            \App\Repositories\RolesRepositoryInterface::class,
            \App\Repositories\RolesRepository::class
        );

        $this->app->bind(
            \App\Repositories\ListsRepositoryInterface::class,
            \App\Repositories\ListsRepository::class
        );

        $this->app->bind(
            \App\Repositories\LevelsRepositoryInterface::class,
            \App\Repositories\LevelsRepository::class
        );

        $this->app->bind(
            \App\Repositories\ImagesRepositoryInterface::class,
            \App\Repositories\ImagesRepository::class
        );
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
