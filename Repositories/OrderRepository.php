<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Order;

class OrderRepository
{


	public static function list($search = '', $limit = 10){
		$orders =  Order::where('id', $search)->
		orWhereHas('order_client', function($query) use ($search) {
			$query->where('corporate_name', 'like', '%'.$search.'%');
		})->
		orWhereHas('order_saller', function($query) use ($search) {
			$query->where('name', 'like', '%'.$search.'%');
		})->
		orWhereHas('status', function($query) use ($search) {
			$query->where('description', 'like', '%'.$search.'%');
		})->
		with(['order_client', 'order_client.order_client_address', 'order_saller', 'order_payment'])->
		paginate($limit);

		$orders->appends(request()->query());
		return $orders;
	}


	public static function storeClientSaller($client_id, $saller_id){
		$order = Order::create([]);
		$order->order_client->update(['client_id' => $client_id]);
		$order->order_saller->update(['saller_id' => $saller_id]);
	}


	public static function update(Order $order, $data){
		$order->update($data);
	}


	public static function destroy(Order $order){
		$order->delete();
	}


}
