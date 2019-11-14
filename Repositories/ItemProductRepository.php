<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Item;

class ItemRepository
{


	public static function list($search = '', $limit = 10){
		$items =  Item::orWhereHas('item_product', function($query) use ($search) {
			$query->where('description', 'like', '%'.$search.'%')->
			orWhere('sku', 'like', '%'.$search.'%');
		})->
		with(['item_product'])->
		paginate($limit);

		$items->appends(request()->query());
		return $items;
	}


	public static function store($data){
		$item = Item::create($data);
		/*$order->order_client->update(['client_id' => $client_id]);
		$order->order_saller->update(['saller_id' => $saller_id]);*/
	}


	public static function update(Item $item, $data){
		$item->update($data);
	}


	public static function destroy(Item $item){
		$item->delete();
	}


}
