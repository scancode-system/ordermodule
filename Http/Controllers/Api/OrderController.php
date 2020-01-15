<?php

namespace Modules\Order\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Repositories\ItemRepository;
use Modules\Order\Entities\Order;
use Modules\Saller\Entities\Saller;
use Modules\Order\Http\Requests\OrderDiscountRequest;

class OrderController extends Controller
{

	public function load(Request $request, Order $order)
	{
		$order->total = $order->total;
		$order->load(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status']);
		foreach ($order->items as $item) {
			$item->total = $item->total;   
			$item->price_net = $item->price_net;
			$item->tax_value = $item->tax_value;
			$item->discount_value = $item->discount_value;
			$item->addition_value = $item->addition_value;
		}
		return $order;
	}

	public function loadBySaller(Request $request, Saller $saller)
	{
		$orders = collect([]);
		$order_sallers = $saller->order_sallers;
		foreach ($order_sallers as $order_saller) {
			$order = $order_saller->order;
			$order->load('order_client');
			$order->total = $order->total; 
			$orders->push($order);
		}
		return $orders;
	}

	public function store(Request $request)
	{
		$order = OrderRepository::store($request->all());
		$order = OrderRepository::loadById($order->id);
		$order->total = $order->total;
		$order->load(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status']);
		foreach ($order->items as $item) {
			$item->total = $item->total;  
			$item->price_net = $item->price_net; 
			$item->tax_value = $item->tax_value;
			$item->discount_value = $item->discount_value;
			$item->addition_value = $item->addition_value;
		}
		return $order;
	}

	public function update(Request $request, Order $order)
	{
		$order = OrderRepository::update($order, $request->all());
		$order->total = $order->total;
		$order->load(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status']);
		foreach ($order->items as $item) {
			$item->total = $item->total; 
			$item->price_net = $item->price_net;  
			$item->tax_value = $item->tax_value;
			$item->discount_value = $item->discount_value;
			$item->addition_value = $item->addition_value;
		}
		return $order;
	} 

	public function updateBuyer(Request $request, Order $order)
	{
		$order = OrderRepository::updateBuyer($order, $request->all());
		$order->total = $order->total;
		$order->load(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status']);
		foreach ($order->items as $item) {
			$item->total = $item->total;  
			$item->price_net = $item->price_net; 
			$item->tax_value = $item->tax_value;
			$item->discount_value = $item->discount_value;
			$item->addition_value = $item->addition_value;
		}
		return $order;
	} 

	public function updateDiscount(OrderDiscountRequest $request, Order $order)
	{
		ItemRepository::updateItemsDiscount($order->items, $request->discount);

		$order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($order->id);
		$order->total = $order->total;
		foreach ($order->items as $item) {
			$item->total = $item->total;   
			$item->price_net = $item->price_net;
			$item->tax_value = $item->tax_value;
			$item->discount_value = $item->discount_value;
			$item->addition_value = $item->addition_value;
		}
		return $order;
	}


}




