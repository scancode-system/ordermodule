<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;
use Illuminate\Support\Collection;

class MiniChartSallerComposer extends ServiceComposer {

    private $sales_names;

    private $names;
    private $sales;
    private $best;

    public function assign($view){
        $this->sales_names($view->orders_completed);

        $this->names();
        $this->sales();
        $this->best();
    }


    private function sales_names($orders_completed){
        $this->sales_names = new Collection();

        $orders_today = $orders_completed->filter(function ($order, $key) {
            return $order->closing_date->isToday();
        });

        $orders_sallers = $orders_today->groupBy('order_saller.saller_id');

        foreach ($orders_sallers as $key => $orders_saller) {
            $name = $orders_saller->first()->order_saller->name;
            $total = $orders_saller->sum('total');
            $this->sales_names->put($name, $total);
        }

        $this->sales_names = $this->sales_names->sort()->reverse()->slice(0, 5);
    }

    private function names(){
        $this->names = $this->sales_names->keys();
    }

    private function sales(){
        $this->sales = $this->sales_names->values();
    }

    private function best(){
        $this->best = $this->names->first();
    }

    public function view($view){
       $view->with('names', $this->names);
       $view->with('sales', $this->sales);
       $view->with('best', $this->best);
   }

}