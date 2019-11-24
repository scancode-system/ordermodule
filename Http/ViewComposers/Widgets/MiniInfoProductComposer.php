<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MiniInfoProductComposer extends ServiceComposer {

    private $qty;
    private $description;

    public function assign($view){
        $this->total($view->orders_completed);
    }

    private function total($orders_completed){
        $items_all = $orders_completed->reduce(function ($carry, $order) {
            return $carry->merge($order->items);
        }, collect([]));

        $items_products_grouped = $items_all->groupBy('product_id');

        $items_product = $items_products_grouped->reduce(function ($carry, $items) {
            if(is_null($carry)){
                return $items;
            }
            if($carry->sum('qty') > $items->sum('qty')){
                return $carry;
            } else {
                return $items;
            }
            return $carry->merge($order->items);
        });        

        $this->qty = $items_product->sum('qty');
        $this->description = $items_product->first()->item_product->description;
    }

    public function view($view){
        $view->with('qty', $this->qty);
        $view->with('description', $this->description);
    }

}