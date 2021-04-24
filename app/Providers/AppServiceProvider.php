<?php

namespace App\Providers;

use App\Repositories\Contracts\AuthorRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\Contracts\ComicRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquents\CategoryEloquentRepository;
use App\Repositories\Eloquents\ComicEloquentRepository;
use App\Repositories\Eloquents\ChapterEloquentRepository;
use App\Repositories\Eloquents\AuthorEloquentRepository;
use App\Repositories\Eloquents\UserEloquentRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(CategoryRepository::class, CategoryEloquentRepository::class);
        $this->app->bind(AuthorRepository::class,   AuthorEloquentRepository::class);
        $this->app->bind(ComicRepository::class,    ComicEloquentRepository::class);
        $this->app->bind(ChapterRepository::class,  ChapterEloquentRepository::class);
        $this->app->bind(UserRepository::class,     UserEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
