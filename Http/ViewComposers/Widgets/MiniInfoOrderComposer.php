<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MiniInfoOrderComposer extends ServiceComposer {

    private $total;

    public function assign($view){
        $this->total($view->orders_completed);
    }

    private function total($orders_completed){
        $this->total = $orders_completed->count();
    }

    public function view($view){
        $view->with('total', $this->total);
   }

}