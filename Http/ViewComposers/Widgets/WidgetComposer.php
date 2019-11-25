<?php

namespace Modules\Order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Entities\Status;

class WidgetComposer extends ServiceComposer {

    private $orders;
    private $orders_completed;

    public function assign($view){
        $this->orders();
        $this->orders_completed();
    }

    private function orders(){
        $this->orders = OrderRepository::loadAllWithAllInfo();
    }

    private function orders_completed(){
        $this->orders_completed = $this->orders->filter(function ($order, $key) {
            return $order->status_id == Status::COMPLETED;
        });
    }

    public function view($view){
        $view->with('orders', $this->orders);
        $view->with('orders_completed', $this->orders_completed);
    }

}