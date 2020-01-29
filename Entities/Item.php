<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\ItemProduct;
use Modules\Order\Entities\ItemTax;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Rocky\Eloquent\HasDynamicRelation;

class Item extends Model 
{
	use HasDynamicRelation;
	
	protected $guarded = [];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function item_product()
	{
		return $this->hasOne(ItemProduct::class);
	}

	public function item_taxes()
	{
		return $this->hasMany(ItemTax::class);
	}


	// accessors
	public function getDiscountValueAttribute($value)
	{
		return ($this->price*$this->discount)/100;
	}


	public function getAdditionValueAttribute($value)
	{
		return (($this->price-$this->discount_value)*$this->addition)/100;
	}

	public function getTaxesAttribute($value)
	{
		$item_taxes = $this->item_taxes;
		foreach($item_taxes as $item_tax) {
			$item_tax->value = $item_tax->value;
		}
		return $item_taxes;
	}

	public function getTaxValueAttribute($value)
	{
		$sum = 0;
		$item_taxes = $this->item_taxes;
		foreach($item_taxes as $item_tax) {
			$sum+= $item_tax->value;
		}
		return $sum;
	}

	public function getPriceNetAttribute($value)
	{
		return $this->price-$this->discount_value+$this->addition_value+$this->tax_value;
	}


	public function getTotalGrossAttribute($value)
	{
		return $this->price*$this->qty;
	}
	

	public function getTotalDiscountValueAttribute($value)
	{
		return $this->discount_value*$this->qty;
	}



	public function getTotalAdditionValueAttribute($value)
	{
		return $this->addition_value*$this->qty;
	}


	public function getTotalTaxValueAttribute($value)
	{
		return $this->tax_value*$this->qty;
	}

	public function getTotalAttribute($value)
	{
		return $this->price_net*$this->qty;
	}


}
