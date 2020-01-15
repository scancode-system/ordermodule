<?php

namespace Modules\Order\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Item;
use Modules\Order\Repositories\ItemRepository;
use Modules\Order\Http\Requests\ItemRequest;


class ItemController extends Controller
{

    /*public function load(Request $request, Order $order) 
    {
        $items = $order->items;
        foreach ($items as $item) {
            $item->total = $item->total;   
        }
        $items->load('item_product'); 
        return $order->items;
    }*/

    public function store(ItemRequest $request, Order $order)
    {
        $item = ItemRepository::store($request->all());
        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($item->order_id);
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total;
            $item->price_net = $item->price_net;
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->addition_value = $item->addition_value;
        }
        return $order;
    }

    public function update(ItemRequest $request, Item $item)
    {
        ItemRepository::update($item, $request->all());
        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($item->order_id); 
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total;
            $item->price_net = $item->price_net;
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->addition_value = $item->addition_value;
        }
        return $order;
    }

    public function destroy(Request $request, Item $item){
        $order_id = $item->order->id;
        ItemRepository::destroy($item);

        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($order_id); 
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total; 
            $item->price_net = $item->price_net;  
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->addition_value = $item->addition_value;
        }
        return $order;
    }

}
