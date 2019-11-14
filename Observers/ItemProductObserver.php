<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\ItemProduct;
use Modules\Product\Entities\Product;


class ItemProductObserver
{

	public function creating(ItemProduct $item_product)
	{
		$product = Product::find($item_product->item->product_id);

		$item_product->sku = $product->sku;
		$item_product->description = $product->description;
		$item_product->price = $product->price;
		$item_product->category = $product->product_category->description;
	}	

}
