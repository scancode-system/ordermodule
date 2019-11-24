<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MiniChartOrderComposer extends ServiceComposer {

    private $orders_hours;
    private $orders;
    private $hours;
    private $total;

    public function assign($view){
        $this->orders_hours($view->orders_completed);
        $this->orders();
        $this->hours();
        $this->total();
    }


private function orders_hours($orders_completed){
        $this->orders_hours = [];

        $orders_today = $orders_completed->filter(function ($order, $key) {
            return $order->closing_date->isToday();
        });

        $orders_grouped = ($orders_today->groupBy(function($order){
            return $order->closing_date->format('H:00');                                                                           
        }))->sortKeys();

        foreach ($orders_grouped as $hour => $orders) {
            $this->orders_hours[$hour] = $orders->count();
        }
        
    }

    private function orders(){
        $this->orders = array_values($this->orders_hours);
    }

    private function hours(){
        $this->hours = array_keys($this->orders_hours);
    }

    private function total(){
        $this->total = collect($this->orders)->sum();
    }

    public function view($view){
     $view->with('orders', $this->orders);
     $view->with('hours', $this->hours);
     $view->with('total', $this->total);        
    }

}