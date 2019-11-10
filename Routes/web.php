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
	// post
	Route::post('', 'OrderController@store')->name('orders.store');
	// put
	Route::put('{order}', 'OrderController@update')->name('orders.update');
	Route::put('{order}/client', 'OrderController@updateClient')->name('orders.update.client');
	Route::put('{order}/representative', 'OrderController@updateRepresentative')->name('orders.update.representative');
	Route::put('{order}/payment', 'OrderController@updatePayment')->name('orders.update.payment');
	// delete
	Route::delete('{order}/destroy', 'OrderController@destroy')->name('orders.destroy');
});

Route::prefix('order_items')->middleware('auth')->group(function() {
	// post
	Route::post('', 'OrderItemController@store')->name('order_items.store');
	// put
	Route::put('{order_item}', 'OrderItemController@update')->name('order_items.update');
	// delete
	Route::delete('{order_item}/destroy', 'OrderItemController@destroy')->name('order_items.destroy');
});