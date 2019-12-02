<?php

namespace Modules\Order\Observers;


use Modules\Order\Entities\Item;
use Modules\Order\Entities\ItemProduct;


class ItemObserver
{

	public function creating(Item $item)
	{
		$item->price = $item->product->price;
		$this->checkDiscountLimits($item);
	}	

	public function created(Item $item)
	{
		ItemProduct::create(['item_id' => $item->id]);
	}	


	public function updating(Item $item)
	{
		$this->checkDiscountLimits($item, $item->item_product->discount_limit);
	}


	private function checkDiscountLimits(Item $item){
		$limit_max = $item->product->discount_limit;
		$limit_min = $item->order->order_payment->discount;

		if($limit_max < $item->discount){
			$item->discount = $limit_max;
		}
		if($limit_min > $item->discount){
			$item->discount = $limit_min;	
		}


	}
}
