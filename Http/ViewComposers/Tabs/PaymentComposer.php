<?php

namespace Modules\Order\Http\ViewComposers\Tabs;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Payment\Repositories\PaymentRepository;


class PaymentComposer extends ServiceComposer {

    private $select_payments;

    public function assign($view){
        $this->select_payments();
    }

    private function select_payments(){
        $this->select_payments = PaymentRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('select_payments', $this->select_payments);
    }

}