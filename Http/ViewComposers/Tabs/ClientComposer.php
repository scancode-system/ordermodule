<?php

namespace Modules\Order\Http\ViewComposers\Tabs;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Client\Repositories\ClientRepository;


class ClientComposer extends ServiceComposer {

    private $select_clients;

    public function assign($view){
        $this->select_clients();
    }

    private function select_clients(){
        $this->select_clients = ClientRepository::toSelect('id', 'corporate_name');
    }


    public function view($view){
        $view->with('select_clients', $this->select_clients);
    }

}