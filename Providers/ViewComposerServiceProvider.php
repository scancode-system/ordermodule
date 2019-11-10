<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Order\Http\ViewComposers\EditComposer;
use Modules\Order\Http\ViewComposers\IndexComposer;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('order::index', IndexComposer::class);
		View::composer('order::edit', EditComposer::class);
	}

	public function register() {
        //
	}

}
