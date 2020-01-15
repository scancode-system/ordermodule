<?php

namespace Modules\Order\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Order\Http\Middleware\OrderLockedMiddleware;
use Modules\Order\Http\Middleware\OrderLockedAppMiddleware;

class MiddlewareServiceProvider extends ServiceProvider
{

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        app('router')->aliasMiddleware('order-locked', OrderLockedMiddleware::class);
        app('router')->aliasMiddleware('order-locked-app', OrderLockedAppMiddleware::class);
    }


}
