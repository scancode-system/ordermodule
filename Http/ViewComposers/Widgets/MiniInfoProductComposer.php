<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;
use Illuminate\Support\Collection;


class MiniInfoProductComposer extends ServiceComposer {

    private $qty;
    private $description;

    public function assign($view){
        $this->total($view->orders_completed);
    }

    private function total($orders_completed){
        $items = $orders_completed->reduce(function ($carry, $order) {
            return $carry->merge($order->items);
        }, collect([]));

        $items_grouped = $items->groupBy('product_id');

        $product = $items_grouped->reduce(function ($carry, $items) {
            if($carry->qty > $items->sum('qty')){
                return $carry;
            } else {
                $carry->qty = $items->sum('qty');
                $carry->description = $items->first()->item_product->description; 
                return $carry;
            }
        }, (object)['qty' => 0, 'description' => '']);        

        $this->qty = $product->qty;
        $this->description = $product->description;
    }

    public function view($view){
        $view->with('qty', $this->qty);
        $view->with('description', $this->description);
    }

}