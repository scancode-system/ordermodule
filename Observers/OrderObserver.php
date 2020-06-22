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
use Modules\Order\Repositories\SettingOrderRepository;
use Carbon\Carbon;
use Exception;

class OrderObserver
{

	public function updating(Order $order)
	{
		if($order->isDirty('status_id')){
			if($order->status_id == STATUS::COMPLETED){
				if(!$order->first_closure){
					$order->first_closure = true;
				}


				SettingOrderRepository::load();
				$message = null;
				if(is_null($order->order_client->client_id))
				{
					$message = 'Cliente não selecinado';
				} else if(is_null($order->order_client->buyer) && (SettingOrderRepository::load())->buyer)
				{
					$message = 'Comprador não selecionado';
				} else if(is_null($order->order_saller->saller_id))
				{
					$message = 'Representante não selecinado';
				} else if(is_null($order->order_payment->payment_id))
				{
					$message = 'Pagamento não selecinado';
				} else if($order->order_payment->min_value > $order->total)
				{
					$message = 'O Valor da compra não atingiu o valor mínimo para esta forma de pagamento';
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

}
