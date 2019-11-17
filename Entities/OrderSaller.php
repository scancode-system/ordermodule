<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderSaller extends Model
{
    protected $fillable = ['order_id', 'saller_id'];

    public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
