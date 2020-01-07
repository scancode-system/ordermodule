<?php

Route::prefix('orders')->middleware('auth.basic.once')->group(function() {
	
	Route::get('{order}', 'Api\OrderController@load');

	Route::post('', 'Api\OrderController@store');

	Route::put('{order}', 'Api\OrderController@update')->name('orders.update');
});
