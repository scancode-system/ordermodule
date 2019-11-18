<?php

namespace Modules\order\Http\ViewComposers\Settings;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\SettingOrderRepository;


class SettingComposer extends ServiceComposer {

    private $setting_order;

    public function assign($view){
        $this->setting_order();
    }


    private function setting_order(){
        $this->setting_order = SettingOrderRepository::load();
    }


    public function view($view){
        $view->with('setting_order', $this->setting_order);
    }

}