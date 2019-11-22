<?php

namespace Modules\Order\Observers;


use Modules\Order\Entities\Item;
use Modules\Order\Entities\ItemProduct;


class ItemObserver
{

	public function creating(Item $item)
	{
		$item->price = $item->product->price;
	}	

	public function created(Item $item)
	{
		ItemProduct::create(['item_id' => $item->id]);
	}	

}
