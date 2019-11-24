<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MiniChartSaleComposer extends ServiceComposer { 

    private $sales_hours;
    private $sales;
    private $hours;
    private $total;

    public function assign($view){
        $this->sales_hours($view->orders_completed);
        $this->sales();
        $this->hours();
        $this->total();
    }

    private function sales_hours($orders_completed){
        $this->sales_hours = [];

        $orders_today = $orders_completed->filter(function ($order, $key) {
            return $order->closing_date->isToday();
        });
        
        $orders_grouped = ($orders_today->groupBy(function($order){
            return $order->closing_date->format('H:00');                                                                           
        }))->sortKeys();

        foreach ($orders_grouped as $hour => $orders) {
            $this->sales_hours[$hour] = $orders->sum('total');
        }
    }

    private function sales(){
        $this->sales = array_values($this->sales_hours);
    }

    private function hours(){
        $this->hours = array_keys($this->sales_hours);
    }

    private function total(){
        $this->total = collect($this->sales)->sum();
    }

    public function view($view){
     $view->with('sales', $this->sales);
     $view->with('hours', $this->hours);
     $view->with('total', $this->total);
 }

}