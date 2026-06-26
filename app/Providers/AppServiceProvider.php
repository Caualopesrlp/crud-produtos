<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Interfaces\ProdutoServiceInterface;
use App\Services\ProdutoService;

use App\Repositories\Interfaces\ProdutoRepositoryInterface;
use App\Repositories\ProdutoRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class
        );

        $this->app->bind(
            ProdutoServiceInterface::class,
            ProdutoService::class
        );
    }

    public function boot(): void
    {
        //
    }
}