<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderSaller;
use Modules\Saller\Entities\Saller;

class OrderSallerObserver
{

	public function creating(OrderSaller $order_saller)
	{
		$saller = Saller::find($order_saller->saller_id);

		$order_saller->name = $saller->name;
		$order_saller->email = $saller->email;
	}	


	public function updating(OrderSaller $order_saller)
	{
		$saller = Saller::find($order_saller->saller_id);

		$order_saller->name = $saller->name;
		$order_saller->email = $saller->email;
	}


}
