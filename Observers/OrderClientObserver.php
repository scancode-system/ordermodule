<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Client\Entities\Client;

class OrderClientObserver
{

	public function creating(OrderClient $order_client)
	{
		if($order_client->isDirty('client_id'))
		{
			$this->refreshClient($order_client);		
		}
	}

	public function created(OrderClient $order_client)
	{
		if($order_client->isDirty('client_id'))
		{
			$this->refreshClientAddress($order_client);
		}
	}


	public function updating(OrderClient $order_client)
	{
		if($order_client->isDirty('client_id'))
		{
			$this->refreshClient($order_client);		
		}
	}	

	public function updated(OrderClient $order_client)
	{
		if($order_client->isDirty('client_id'))
		{
			$this->refreshClientAddress($order_client);
		}
	}


	private function refreshClient($order_client){
		$client = Client::find($order_client->client_id);
		if($client)
		{
			$order_client->corporate_name = $client->corporate_name;
			$order_client->fantasy_name = $client->fantasy_name;
			$order_client->cpf_cnpj = $client->cpf_cnpj;
			$order_client->buyer = $client->buyer;
			$order_client->email = $client->email;
			$order_client->phone = $client->phone;

			$shipping_company = $client->shipping_company;
			if($client->shipping_company){
				$order_shipping_company = $order_client->order->order_shipping_company;
				$order_shipping_company->shipping_company_id = $client->shipping_company->id;
				$order_shipping_company->description = $client->shipping_company->description;
				$order_shipping_company->save();
			}
		}
		return $order_client;
	}

	private function refreshClientAddress($order_client){
		$client = Client::find($order_client->client_id);
		if($client)
		{
			$client_address = $client->client_address;

			$order_client_address = $order_client->order_client_address;
			if(is_null($order_client_address)){
				$order_client_address = OrderClientAddress::create(['order_client_id' => $order_client->id]);
			}
			$order_client_address->street = $client_address->street;
			$order_client_address->number = $client_address->number;
			$order_client_address->apartment = $client_address->apartment;
			$order_client_address->neighborhood = $client_address->neighborhood;
			$order_client_address->city = $client_address->city;
			$order_client_address->st = $client_address->st;
			$order_client_address->postcode = $client_address->postcode;
			$order_client_address->save();
		}
	}

}
