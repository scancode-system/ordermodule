<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MiniChartAverageTicketComposer extends ServiceComposer {

    private $total_sales;
    private $total_orders;
    private $average_tickets_hours;
    
    private $average_tickets;
    private $hours;
    private $total;

    public function assign($view){
        $this->average_tickets_hours($view->orders_completed);
        $this->average_tickets();
        $this->hours();
    }

    private function average_tickets_hours($orders_completed){
        $this->average_tickets_hours = [];
        $this->total_sales = 0;
        $this->total_orders = 0;

        $orders_today = $orders_completed->filter(function ($order, $key) {
            return $order->closing_date->isToday();
        });

        $this->orders_grouped = ($orders_today->groupBy(function($order){
            return $order->closing_date->format('H:00');                                                                           
        }))->sortKeys();

        foreach ($this->orders_grouped as $hour => $orders) {
            $this->average_tickets_hours[$hour] = $orders->avg('total');
        }

        $this->total = $orders_today->avg('total');

    }

    private function average_tickets(){
        $this->average_tickets = array_values($this->average_tickets_hours);
    }

    private function hours(){
        $this->hours = array_keys($this->average_tickets_hours);
    }


    public function view($view){
     $view->with('average_tickets', $this->average_tickets);
     $view->with('hours', $this->hours);
     $view->with('total', $this->total);
 }

}