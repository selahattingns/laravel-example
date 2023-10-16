<?php

namespace App\Providers;

use App\Interfaces\ProductInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class InterfaceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductInterface::class, ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
