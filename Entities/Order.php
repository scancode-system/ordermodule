<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;
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


	public function order_shipping_company()
	{
		return $this->hasOne(OrderShippingCompany::class);
	}


	// accessors
	public function getTotalAttribute($value)
	{
		return 0;
	}


	public function getTotalGrossAttribute($value)
	{
		return 0;
	}


	public function getDiscountValueAttribute($value)
	{
		return 0;
	}

	public function getAdditionValueAttribute($value)
	{
		return 0;
	}


	public function getTaxAmountAttribute($value)
	{
		return 0;
	}



	public function getNumberItemsAttribute($value)
	{
		return 0;
	}

	public function getDeliveryNameAttribute($value)
	{
		if($this->full_delivery == 1){
			return 'Integral';
		} else {
			return 'Parcial';
		}
	}


}
