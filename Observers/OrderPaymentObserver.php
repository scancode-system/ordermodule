<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderPayment;
use Modules\Order\Repositories\ItemRepository;
use Modules\Payment\Entities\Payment;

class OrderPaymentObserver
{

	public function updating(OrderPayment $order_payment)
	{
		$payment = Payment::find($order_payment->payment_id);
		if($payment){
			$order_payment->description = $payment->description;
			$order_payment->min_value = $payment->min_value;
			$order_payment->discount = $payment->discount;
			$order_payment->addition = $payment->addition;
		} else {
			$order_payment->description = null;
			$order_payment->min_value = 0;
			$order_payment->discount = 0;
			$order_payment->addition = 0;
		}

		$this->giveDiscounts($order_payment);
	}

	private function giveDiscounts($order_payment){
		$items = $order_payment->order->items;
		foreach ($items as $item) {
			if($item->discount == $order_payment->getOriginal('discount')){
				ItemRepository::updateItemDiscount($item, $order_payment->discount);
			} elseif($item->discount < $order_payment->discount){
				ItemRepository::updateItemDiscount($item, $order_payment->discount);
			}			
		}
	}

}
