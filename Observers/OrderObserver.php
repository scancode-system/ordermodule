<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;
use Modules\Order\Entities\Status;
use Modules\Order\Exceptions\RedirectBackException;
use Carbon\Carbon;

class OrderObserver
{

	public function updating(Order $order)
	{
		if($order->isDirty('status_id')){
			if($order->status_id == STATUS::COMPLETED){
				if(is_null($order->order_client->client_id) || is_null($order->order_saller->saller_id) || is_null($order->order_payment->payment_id))	{
					throw new RedirectBackException('O Pedido não pode ser fechado é necessário que tanto cliente, representante e pagamento seja selecionado.');
				} else {
					$order->closing_date = Carbon::now();
				}
			} else {
				$order->closing_date = null;
			}
		}
	}


	public function updated(Order $order){
		if($order->isDirty('payment_id')){
			$payment = Payment::find($order_payment->order->payment_id);
			$order_payment->description = $payment->description;
			$order_payment->min_value = $payment->min_value;
			$order_payment->discount = $payment->discount;
			$order_payment->addition = $payment->addition;
			$order->order_payment->update(['order_id' => $order->id]);
		}
	}		



}
