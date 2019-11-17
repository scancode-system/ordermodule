<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderPayment;
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
			$order_payment->min_value = null;
			$order_payment->discount = null;
			$order_payment->addition = null;
		}
	}

}
