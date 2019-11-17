<?php

namespace Modules\Order\Http\ViewComposers\Tabs;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Saller\Repositories\SallerRepository;


class SallerComposer extends ServiceComposer {

    private $select_sallers;

    public function assign($view){
        $this->select_sallers();
    }

    private function select_sallers(){
        $this->select_sallers = SallerRepository::toSelect('id', 'name');
    }


    public function view($view){
        $view->with('select_sallers', $this->select_sallers);
    }

}