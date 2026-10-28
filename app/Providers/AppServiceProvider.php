<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\BooksRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Перенесенная привязка из старого провайдера
        $this->app->bind(
            BooksRepositoryInterface::class,
            BooksRepository::class
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
