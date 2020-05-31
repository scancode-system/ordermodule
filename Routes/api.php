<?php

Route::prefix('orders')->middleware('auth.basic.once')->group(function() {
	
	Route::get('{order}', 'Api\OrderController@load');
	Route::get('loadBySaller/{saller}', 'Api\OrderController@loadBySaller');

	Route::post('', 'Api\OrderController@store');

	Route::put('{order}', 'Api\OrderController@update')->middleware('order-locked-app');
	Route::put('{order}/updateBuyer', 'Api\OrderController@updateBuyer');
	Route::put('{order}/updateDiscount', 'Api\OrderController@updateDiscount')->middleware('order-locked-app');
});

Route::prefix('items')->middleware('auth.basic.once')->group(function() {
	
	//Route::get('{order}', 'Api\ItemController@load');

	Route::post('{order}', 'Api\ItemController@store')->middleware('order-locked-app');
	Route::put('{item}', 'Api\ItemController@update')->middleware('order-locked-app');
	Route::put('{order}/many', 'Api\ItemController@updateMany')->middleware('order-locked-app');
	Route::delete('{item}', 'Api\ItemController@destroy')->middleware('order-locked-app');

});
