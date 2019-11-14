<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Client\Entities\Client;

class OrderClientObserver
{

	public function creating(OrderClient $order_client)
	{
		$client = Client::find($order_client->order->client_id);
		$order_client->corporate_name = $client->corporate_name;
		$order_client->fantasy_name = $client->fantasy_name;
		$order_client->cpf_cnpj = $client->cpf_cnpj;
		$order_client->buyer = $client->buyer;
		$order_client->email = $client->email;
		$order_client->phone = $client->phone;

	}

	public function created(OrderClient $order_client)
	{
		OrderClientAddress::create(['order_client_id' => $order_client->id]);
	}

}
