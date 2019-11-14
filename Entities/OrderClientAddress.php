<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClient;

class OrderClientAddress extends Model
{
    protected $guarded = [];

    public function order_client()
	{
		return $this->belongsTo(OrderClient::class);
	}
}
