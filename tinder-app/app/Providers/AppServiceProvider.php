<?php

namespace App\Providers;

use App\Modules\Likes\Repositories\Contracts\LikesRepository;
use App\Modules\Likes\Repositories\EloquentLikesRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        LikesRepository::class => EloquentLikesRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
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
