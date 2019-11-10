<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;


class OrderObserver
{

	public function created(Order $order)
	{
		$order_client = OrderClient::create(['order_id' => $order->id]);
		OrderClientAddress::create(['order_client_id' => $order_client->id]);
		OrderSaller::create(['order_id' => $order->id]);
		OrderPayment::create(['order_id' => $order->id]);
		OrderShippingCompany::create(['order_id' => $order->id]);
	}	

}
