<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Http\Livewire\LikeButton;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Payjp\Payjp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Payjp::setApiKey(config('payjp.secret_key'));
        Blade::component('like-button', \App\View\Components\LikeButton::class);
    }
}
