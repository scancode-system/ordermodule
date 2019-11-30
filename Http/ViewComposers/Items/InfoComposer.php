<?php

namespace Modules\Order\Http\ViewComposers\Items;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;


class InfoComposer extends ServiceComposer {


    private $product;


    public function assign($view){
        $this->product($view->product);
    }


    private function product($product){
        if(is_null($product)){
            $this->product = request()->route('product');
        } else {
            $this->product = $product;
        }
    }


    public function view($view){
        $view->with('product', $this->product);
    }

}