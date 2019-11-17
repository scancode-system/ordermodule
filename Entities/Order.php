<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;
use Modules\Order\Entities\Status;
use Modules\Order\Entities\Item;


class Order extends Model
{

	protected $fillable = ['id', 'status_id', 'full_delivery', 'closing_date', 'observation', 'signature'];


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

	public function items()
	{
		return $this->hasMany(Item::class);
	}


	// accessors
	public function getTotalAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->total;
		}
		return $sum;
	}


	public function getTotalGrossAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->total_gross;
		}
		return $sum;
	}


	public function getDiscountValueAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->total_discount_value;
		}
		return $sum;
	}

	public function getAdditionValueAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->total_addition_value;
		}
		return $sum;
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
