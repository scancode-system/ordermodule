<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Saller\Entities\Saller;

class OrderSaller extends Model
{
    protected $fillable = ['order_id', 'saller_id'];

    public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function saller()
	{
		return $this->belongsTo(Saller::class);
	}
}
