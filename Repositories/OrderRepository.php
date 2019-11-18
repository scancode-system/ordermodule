<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;

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

	public static function loadClosedOrders(){
		$orders =  Order::where('status_id', 1)->
		with(['order_client', 'order_client.order_client_address', 'order_saller', 'order_payment'])->
		get();
		return $orders;
	}


	public static function store($data){
		$order = Order::create($data);

		OrderClient::create(['order_id' => $order->id, 'client_id' => $data['client_id']]);
		OrderSaller::create(['order_id' => $order->id, 'saller_id' => $data['saller_id']]);
		OrderPayment::create(['order_id' => $order->id]);
		OrderShippingCompany::create(['order_id' => $order->id]);		
	}


	public static function update(Order $order, $data){
		$order->update($data);
		$order->order_payment->update($data);
		$order->order_client->update($data);
		$order->order_saller->update($data);
		$order->order_shipping_company->update($data);
	}


	public static function destroy(Order $order){
		$order->delete();
	}

	public static function clone(Order $order){
		$order_cloned = $order->replicate();
		$order_cloned->save();


		OrderClient::create(['order_id' => $order_cloned->id, 'client_id' => $order->order_client->client_id]);
		OrderSaller::create(['order_id' => $order_cloned->id, 'saller_id' => $order->order_saller->saller_id]);
		OrderPayment::create(['order_id' => $order_cloned->id, 'payment_id' => $order->order_payment->payment_id]);
		OrderShippingCompany::create(['order_id' => $order_cloned->id, 'shipping_company_id' => $order->order_shipping_company->shipping_company_id]);

		foreach ($order->items as $item) {
			$item_cloned = $item->replicate();
			$item_cloned->order_id = $order_cloned->id;
			$item_cloned->save();
		}

		return $order_cloned;
	}


}
