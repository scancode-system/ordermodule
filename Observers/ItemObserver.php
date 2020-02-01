<?php

namespace Modules\Order\Observers;


use Modules\Order\Entities\Item;
use Modules\Order\Entities\ItemProduct;
use Modules\Order\Events\ItemModifierPriceEvent;
use Modules\Order\Repositories\PriceModifyRepository;
use Modules\Order\Events\ItemAfterDiscountParseEvent;

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

		$limit_max = $this->getLimitMax($item);
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

		event(new ItemAfterDiscountParseEvent($item));
	}

	private function getLimitMax($item)
	{
		return ($item->item_product)?$item->item_product->discount_limit:$item->product->discount_limit;
	}

}
