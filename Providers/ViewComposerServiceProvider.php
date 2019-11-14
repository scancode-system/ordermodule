<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Order\Http\ViewComposers\EditComposer;
use Modules\Order\Http\ViewComposers\IndexComposer;
use Modules\Order\Http\ViewComposers\Items\ItemsComposer;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		// order
		View::composer('order::index', IndexComposer::class);
		View::composer('order::edit', EditComposer::class);

		// item
		View::composer('order::items.items', ItemsComposer::class);
	}

	public function register() {
        //
	}

}
