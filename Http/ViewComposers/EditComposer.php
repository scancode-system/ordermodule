<?php

namespace Modules\order\Http\ViewComposers;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\StatusRepository;


class EditComposer extends ServiceComposer {

    private $tab;
    private $order;
    private $select_statuses;

    public function assign($view){
        $this->tab();
        $this->order();
        $this->select_statuses();
    }


    private function tab(){
        $this->tab = request()->route('tab');
    }


    private function order(){
        $this->order = request()->route('order');
    }


    private function select_statuses(){
        $this->select_statuses = StatusRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('tab', $this->tab);
        $view->with('order', $this->order);
        $view->with('select_statuses', $this->select_statuses);
    }

}