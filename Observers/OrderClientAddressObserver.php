<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Client\Entities\Client;

class OrderClientAddressObserver
{

	public function creating(OrderClientAddress $order_client_address)
	{
		$client = Client::find($order_client_address->order_client->order->client_id);
		$client_address = $client->client_address;

		$order_client_address->street = $client_address->street;
		$order_client_address->number = $client_address->number;
		$order_client_address->apartment = $client_address->apartment;
		$order_client_address->neighborhood = $client_address->neighborhood;
		$order_client_address->city = $client_address->city;
		$order_client_address->st = $client_address->st;
		$order_client_address->postcode = $client_address->postcode;
	}

}
