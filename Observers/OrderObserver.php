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

class OrderObserver
{

	public function created(Order $order)
	{
		OrderClient::create(['order_id' => $order->id]);
		OrderSaller::create(['order_id' => $order->id]);
		OrderPayment::create(['order_id' => $order->id]);
		OrderShippingCompany::create(['order_id' => $order->id]);
	}

	public function updating(Order $order)
	{
		if($order->isDirty('status_id')){
			if($order->status_id == STATUS::CONCLUIDO){
				if(is_null($order->client_id) || is_null($order->saller_id) || is_null($order->payment_id))	{
					throw new RedirectBackException('O Pedido não pode ser fechado é necessário que tanto cliente, representante e pagamento seja selecionado.');
				}
			}
      	}
	}		



}
