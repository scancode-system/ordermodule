<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\ItemProduct;
use Modules\Order\Entities\Order;

class Item extends Model
{
	protected $guarded = [];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function item_product()
	{
		return $this->hasOne(ItemProduct::class);
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


	public function getDiscountAttribute($value)
	{
		return 0;
	}


	public function getDiscountValueAttribute($value)
	{
		return 0;
	}


	public function getAdditionAttribute($value)
	{
		return 0;
	}


	public function getAdditionValueAttribute($value)
	{
		return 0;
	}


	public function getTaxAttribute($value)
	{
		return 0;
	}

	public function getTaxValueAttribute($value)
	{
		return 0;
	}
}
