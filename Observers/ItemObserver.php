<?php

namespace Modules\Order\Observers;


use Modules\Order\Entities\Item;
use Modules\Order\Entities\ItemProduct;


class ItemObserver
{

	public function creating(Item $item)
	{
		$item->price = $item->product->price;
		$this->checkDiscountLimit($item, $item->product->discount_limit);
	}	

	public function created(Item $item)
	{
		ItemProduct::create(['item_id' => $item->id]);
	}	


	public function updating(Item $item)
	{
		$this->checkDiscountLimit($item, $item->item_product->discount_limit);
	}


	private function checkDiscountLimit(Item $item, $limit){
		if($limit < $item->discount){
			$item->discount = $limit;
		}
	}
}
