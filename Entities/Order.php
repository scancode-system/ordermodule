<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Entities\OrderShippingCompany;
use Modules\Order\Entities\Status;
use Modules\Order\Entities\Item;
use Rocky\Eloquent\HasDynamicRelation; 

class Order extends Model
{
	use HasDynamicRelation;

	protected $fillable = ['id', 'status_id', 'full_delivery', 'closing_date', 'observation', 'signature'];
	protected $dates = [
		'closing_date'
	];

	protected $hidden = ['signature'];
	protected $appends = ['signature_check'];


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
	public function getSignatureCheckAttribute($value)
	{
		if(is_null($this->signature))
		{
			return false;
		} else 
		{
			return true;
		}
	}

	public function getTotalItemsAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->qty;
		}
		return $sum;
	}

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


	public function getTaxValueAttribute($value)
	{
		$sum = 0;
		foreach ($this->items as $item) {
			$sum+= $item->total_tax_value;
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

	public function getDeliveryNameAliasAttribute($value)
	{
		if($this->full_delivery == 1){
			return 'I';
		} else {
			return 'P';
		}
	}


}
