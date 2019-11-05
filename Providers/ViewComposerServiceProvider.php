<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('order::edit', 'Modules\Order\Http\ViewComposers\EditComposer');
	}

	public function register() {
        //
	}

}
