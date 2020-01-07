<?php

namespace Modules\Order\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{

	public function load(Request $request, Order $order)
	{
		$order->total = $order->total;
		$order->load('order_payment');
		return $order;
	}

	public function store(Request $request)
	{
		$order = OrderRepository::store($request->all());
		return $order;
	}

	public function update(Request $request, Order $order){
		$order = OrderRepository::update($order, $request->all());
		return $order;
	} 

}
