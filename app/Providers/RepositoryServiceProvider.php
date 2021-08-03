<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\BooksRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BooksRepositoryInterface::class, 
            BooksRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
