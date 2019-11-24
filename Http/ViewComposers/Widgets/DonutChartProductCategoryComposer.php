<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Product\Repositories\ProductRepository;
use Modules\Order\Repositories\ItemRepository;
use Illuminate\Support\Collection;

class DonutChartProductCategoryComposer extends ServiceComposer {

    private $grouped_categories;

    private $values;
    private $labels;
    private $colors;

    public function assign($view){
        $this->colors();
        $this->grouped_categories($view->orders_completed);
        $this->labels();
        $this->values();
    }

    private function colors(){
        $this->colors = ['#20a8d8', '#c8ced3', '#4dbd74', '#f86c6b', '#ffc107', '#63c2de', '#f0f3f5', '#2f353a', '#6610f2', '#6f42c1', '#e83e8c', '#f8cb00', '#20c997', '#17a2b8', '#acb4bc', '#73818f', '#5c6873'];
    }

    private function grouped_categories($orders_completed){
        $items = $orders_completed->reduce(function ($carry, $order) {
            return $carry->merge($order->items);
        }, new Collection());

        $this->grouped_categories = $items->groupBy('item_product.category');
    }

    private function labels(){
        $this->labels = $this->grouped_categories->keys();
    }

    private function values(){
        $this->values = $this->grouped_categories->reduce(function ($carry, $items) {
            return $carry->push($items->sum('total'));
        }, new Collection());
    }

    public function view($view){
        $view->with('colors', $this->colors);
        $view->with('labels', $this->labels);
        $view->with('values', $this->values);
    }

}