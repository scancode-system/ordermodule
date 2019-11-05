<?php

namespace Modules\order\Http\ViewComposers;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;

class EditComposer extends ServiceComposer {

    private $tab;

    public function assign($view){
        $this->tab();
    }


    private function tab(){
        $this->tab = request()->route('tab');
    }


    public function view($view){
        $view->with('tab', $this->tab);
    }

}