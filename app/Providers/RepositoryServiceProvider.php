<?php

namespace App\Providers;

use App\Repository\AuthorRepository;
use App\Repository\AuthorRepositoryInterface;
use App\Repository\AuthRepository;
use App\Repository\AuthRepositoryInterface;
use App\Repository\BookRepositoryInterface;
use App\Repository\BookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }
}
