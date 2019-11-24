<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;

class MainChartSaleComposer extends ServiceComposer {

    private $days;
    private $hours;
    private $colors;

    public function assign($view){
        $this->days($view->orders_completed);
    }

    private function days($orders_completed){
        $this->colors = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark', 'muted']);
        $this->days = [];

        $orders_grouped_hours = ($orders_completed->groupBy(function($order){
            return $order->closing_date->format('H:00');                                                                           
        }))->sortKeys();

        $this->hours = $orders_grouped_hours->sortKeys()->keys(); 

        $orders_grouped_date = ($orders_completed->groupBy(function($order){
            return $order->closing_date->format('d/m/Y');                                                                           
        }));

        foreach ($orders_grouped_date as $date => $orders_date) {

            $orders_hours = ($orders_date->groupBy(function($order){
                return $order->closing_date->format('H:00');                                                                           
            }));


            $opa = $this->hours->mapWithKeys(function ($hour, $key) use($orders_hours) {
                if(isset($orders_hours[$hour])){
                    return [$hour => $orders_hours[$hour]];
                } else {
                    return [$hour => collect([])];
                }   
            });


            foreach ($opa as $hours => $orders) {
                $this->days[$date]['dataset'][$hours] = $orders->sum('total');
            }
            $this->days[$date]['total'] = $orders_date->sum('total');
            $this->days[$date]['color'] = $this->colors->first();
            $this->colors->shift();
        }

    }


    public function view($view){
     $view->with('days', $this->days);
     $view->with('hours', $this->hours);
 }

}