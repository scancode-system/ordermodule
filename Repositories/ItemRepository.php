<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Item;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Status;
use Modules\Product\Entities\Product;


class ItemRepository
{





	// OLDS
	public static function list($order = null, $search = '', $limit = 10){
		$items =  Item::orWhereHas('item_product', function($query) use ($search) {
			$query->where('description', 'like', '%'.$search.'%')->
			orWhere('sku', 'like', '%'.$search.'%');
		})->
		with(['item_product']);
		if($order){
			$items->where('order_id', $order->id);
		}
		$items = $items->paginate($limit);

		$items->appends(request()->query());
		return $items;
	}


	public static function store($data){
		return Item::create($data);
	}

	// UPDATE
	public static function update(Item $item, $data){
		$item->update($data);
		return $item;
	}

	public static function updateItemsDiscount($items, $discount){
		foreach ($items as $item) {
			self::update($item, ['discount' => $discount]);
		}
	}

	public static function updateItemDiscount($item, $discount){
		$item->update(['discount' => $discount]);
	}


	public static function updateItemsAddition($items, $addition){
		foreach ($items as $item) {
			self::update($item, ['addition' => $addition]);
		}
	}

	public static function destroy(Item $item){
		$item->delete();
	}


	public static function loadItemsClosedOrders(){
		$items = Item::
		whereHas('order', function ($query) {
			$query->where('status_id', Status::COMPLETED);
		})->
		orderBy('order_id')->
		get();

		return $items;
	}


	public static function loadSoldItemsByProduct(Product $product){
		return Item::whereHas('order', function ($query) {
			$query->where('status_id', Status::COMPLETED);
		})->
		where('product_id', $product->id)->get();
	}


/*
	public static function loadProductsSold(){
		$items = Item::whereHas('order', function ($query) {
    		//$query->where('status_id', Status::CONCLUIDO);
		})->groupBy(['product_id'])->get(['product_id']);
		$ids = [];
		foreach ($items as $item) {
			array_push($ids, $item->product_id);
		}

		return $ids;
	}

	public static function getProductsIdSold(){
		$items = Item::whereHas('order', function ($query) {
    		//$query->where('status_id', Status::CONCLUIDO);
		})->groupBy(['product_id'])->get(['product_id']);
		$ids = [];
		foreach ($items as $item) {
			array_push($ids, $item->product_id);
		}

		return $ids;
	}

	public static function loadByProductId($id){
		return Item::where('product_id', $id)->first();
	}
*/

}
