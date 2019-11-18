<?php 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('orders')->middleware('auth')->group(function() {
	Route::get('', 'OrderController@index')->name('orders.index');
	Route::get('{order}/edit/{tab?}', 'OrderController@edit')->name('orders.edit');
	Route::get('{order}/pdf', 'OrderController@pdf')->name('orders.pdf');
	// post
	Route::post('', 'OrderController@store')->name('orders.store');
	Route::post('{order}/clone', 'OrderController@clone')->name('orders.clone');
	// put
	Route::put('{order}', 'OrderController@update')->name('orders.update')->middleware('order-locked');
	Route::put('{order}/status', 'OrderController@update')->name('orders.update.status');	
	// delete
	Route::delete('{order}/destroy', 'OrderController@destroy')->name('orders.destroy');
});


Route::prefix('items')->middleware('auth')->group(function() {
	// post
	Route::post('{order}', 'ItemController@store')->name('items.store')->middleware('order-locked');
	// put
	Route::put('{item}', 'ItemController@update')->name('items.update')->middleware('order-locked');
	// delete
	Route::delete('{item}/destroy', 'ItemController@destroy')->name('items.destroy')->middleware('order-locked');
});


Route::prefix('setting_order')->middleware('auth')->group(function() {
	Route::put('', 'SettingOrderController@update')->name('setting_order.update');

});

Route::prefix('reports')->middleware('auth')->group(function() {
	Route::get('orders', 'ReportController@order')->name('reports.orders');
});