<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\ItemProduct;
use Modules\Order\Entities\Status;

class ItemProductRepository
{


	public static function loadItemsGroupedByProducts(){
		$item_products = ItemProduct::
		join('items', 'items.id', '=', 'item_products.item_id')->
		groupBy(['product_id', 'sku'])->
		get(['product_id', 'sku']);
		//toSql();
		dd($item_products);
		return $items;
	}

}
