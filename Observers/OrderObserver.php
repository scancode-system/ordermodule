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
use Exception;

class OrderObserver
{

	public function updating(Order $order)
	{
		if($order->isDirty('status_id')){
			if($order->status_id == STATUS::COMPLETED){
				$message = null;
				if(is_null($order->order_client->client_id))
				{
					$message = 'Cliente não selecinado';
				} else if(is_null($order->order_client->buyer))
				{
					$message = 'Comprador não selecionado';
				} else if(is_null($order->order_saller->saller_id))
				{
					$message = 'Representante não selecinado';
				} else if( is_null($order->order_payment->payment_id))
				{
					$message = 'Pagamento não selecinado';
				}

				if(!is_null($message))
				{
					throw new Exception($message);
				} else 
				{
					$order->closing_date = Carbon::now();
				}
			} else {
				$order->closing_date = null;
			}
		}
	}


	public function updated(Order $order){
		/*if($order->isDirty('payment_id')){
			$payment = Payment::find($order_payment->order->payment_id);
			$order_payment->description = $payment->description;
			$order_payment->min_value = $payment->min_value;
			$order_payment->discount = $payment->discount;
			$order_payment->addition = $payment->addition;
			$order->order_payment->update(['order_id' => $order->id]);
		}*/
	}		



}
