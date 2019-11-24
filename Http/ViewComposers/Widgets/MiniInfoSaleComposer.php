<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;


class MiniInfoSaleComposer extends ServiceComposer { 

    private $total;

    public function assign($view){
        $this->total($view->orders_completed);
    }

    private function total($orders_completed){
        $this->total = $orders_completed->sum('total');
    }

    public function view($view){
        $view->with('total', $this->total);
   }

}