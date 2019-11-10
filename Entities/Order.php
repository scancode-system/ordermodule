<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\Status;


class Order extends Model
{
	protected $guarded = [];


	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function order_client()
	{
		return $this->hasOne(OrderClient::class);
	}

	public function order_saller()
	{
		return $this->hasOne(OrderSaller::class);
	}

	public function order_payment()
	{
		return $this->hasOne(OrderPayment::class);
	}

}
