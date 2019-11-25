<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order;

class OrderPayment extends Model
{
	protected $fillable = ['order_id', 'payment_id'];


	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
