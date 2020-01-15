<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Order\Entities\Order;
use Modules\Client\Entities\Client;

class OrderClient extends Model
{
    protected $fillable = ['order_id', 'client_id', 'buyer', 'phone', 'email'];

    public function order_client_address()
	{
		return $this->hasOne(OrderClientAddress::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}
}
