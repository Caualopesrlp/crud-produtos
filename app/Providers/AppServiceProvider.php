<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProdutoRepositoryInterface;
use App\Repositories\ProdutoRepository;
use App\Services\Interfaces\ProdutoServiceInterface;
use App\Services\ProdutoService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
    }
}