<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Item;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Status;
use Modules\Product\Entities\Product;
use Carbon\Carbon;


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

	// Destroy
	public static function destroy(Item $item){
		$item->delete();
	}

	public static function destroy_family($order_id, $sku){
		$items = self::familyByOrderSku($order_id, $sku);
		foreach ($items as $item) {
			self::destroy($item);
		}
	}


	// LOAD
	public static function load()
	{	
		return Item::all();
	}

	public static function loadByClosedOrders(){
		$items = Item::
		whereHas('order', function ($query) {
			$query->where('status_id', Status::COMPLETED);
		})->
		orderBy('order_id')->
		get();

		return $items;
	}

	public static function loadById($id)
	{	
		return Item::find($id);
	}

	public static function loadItemsClosedOrders(){ /* deprecated */
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

	public static function loadSoldItemsByProductDate(Product $product, $date){
		return Item::whereHas('order', function ($query) use($date) {
			$query->where('status_id', Status::COMPLETED)->
			whereDate('closing_date', $date);

		})->
		where('product_id', $product->id)->get();
	}

	public static function family(Item $item){
		$items = Item::where('order_id', $item->order_id)->whereHas('item_product', function($query) use ($item) {
			$query->where('sku', $item->product->sku);
		})->get();
		return $items;
	}

	public static function familyByOrderSku($order_id, $sku){
		$items = Item::where('order_id', $order_id)->whereHas('item_product', function($query) use ($sku) {
			$query->where('sku', $sku);
		})->get();
		return $items;
	}

}
