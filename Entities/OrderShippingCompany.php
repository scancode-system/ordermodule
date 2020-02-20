<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\ShippingCompany;

class OrderShippingCompany extends Model
{
    protected $fillable = ['order_id', 'shipping_company_id'];

    public function shipping_company()
	{
		return $this->belongsTo(ShippingCompany::class);
	}

}
