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
/*		OrderClient::create([]);
		OrderClientAddress::create([]);
		OrderSaller::create([]);
		OrderPayment::create([]);
		OrderShippingCompany::create([]);
*/	}	

}
