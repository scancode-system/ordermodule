<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderSaller extends Model
{
    protected $guarded = [];

    public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
