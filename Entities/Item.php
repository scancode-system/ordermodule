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
		return $this->total_gross-$this->total_discount_value+$this->total_addition_value;
	}

	public function getTotalGrossAttribute($value)
	{
		return $this->item_product->price*$this->qty;
	}

	public function getDiscountValueAttribute($value)
	{
		return ($this->item_product->price*$this->discount)/100;
	}

	public function getTotalDiscountValueAttribute($value)
	{
		return $this->discount_value*$this->qty;
	}


	public function getAdditionValueAttribute($value)
	{
		return ($this->item_product->price*$this->addition)/100;
	}

	public function getTotalAdditionValueAttribute($value)
	{
		return $this->addition_value*$this->qty;
	}


}
