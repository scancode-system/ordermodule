<?php

namespace Modules\Order\Observers;


use Modules\Order\Entities\Item;
use Modules\Order\Entities\ItemProduct;
use Modules\Order\Events\ItemModifierPriceEvent;
use Modules\Order\Repositories\PriceModifyRepository;

class ItemObserver
{


	public function created(Item $item)
	{
		ItemProduct::create(['item_id' => $item->id]);
	}	


	public function saving(Item $item)
	{
		$item->price = $item->product->price;



		// pipeline
		$price = $item->price;
		$price_modifiers = PriceModifyRepository::loadByPriority();
		foreach ($price_modifiers as $price_modify) {
			$class = ('Modules\\'.$price_modify->module.'\Services\PriceModifyService');
			$price_modify_service =  new $class();
			$price = $price_modify_service->price($item, $price);
			if($price_modify_service->block())
			{
				break;
			}
		}
		$item->price = $price;


		$this->checkDiscountLimits($item);
	}

	private function checkDiscountLimits(Item $item)
	{
		$limit_max = $item->product->discount_limit;
		$limit_min = $item->order->order_payment->discount;

		if($limit_min > $limit_max)
		{
			$limit_min = $limit_max;
		}

		if($limit_max < $item->discount){
			$item->discount = $limit_max;
		}
		if($limit_min > $item->discount){
			$item->discount = $limit_min;	
		}


	}
}
