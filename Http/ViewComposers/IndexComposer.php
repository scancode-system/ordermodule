<?php

namespace Modules\order\Http\ViewComposers;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\OrderRepository;
use Modules\Client\Repositories\ClientRepository;
use Modules\Saller\Repositories\SallerRepository;


class IndexComposer extends ServiceComposer {


    private $search;
    private $orders;
    private $select_clients;
    private $select_sallers;

    public function assign($view){
        $this->search();
        $this->orders();
        $this->select_clients();
        $this->select_sallers();
    }


    private function search(){
        if(isset(request()->search)){
            $this->search = request()->search;
        } else {
            $this->search = '';
        }
    }


    private function orders(){
        $this->orders = OrderRepository::list($this->search);
    }


    private function select_clients(){
        $this->select_clients = ClientRepository::toSelect('id', 'corporate_name');
    }


    private function select_sallers(){
        $this->select_sallers = SallerRepository::toSelect('id', 'name');
    }


    public function view($view){
        $view->with('orders', $this->orders);
        $view->with('search', $this->search);
        $view->with('select_clients', $this->select_clients);
        $view->with('select_sallers', $this->select_sallers);
    }

}