<?php

namespace Modules\Order\Http\ViewComposers\Items;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Order\Repositories\ItemRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\OrderRepository;


class ItemsComposer extends ServiceComposer {


    private $search;
    private $items;
    private $select_products;


    public function assign($view){
        $this->search();
        $this->items();
        $this->select_products();
    }


    private function search(){
        if(isset(request()->search)){
            $this->search = request()->search;
        } else {
            $this->search = '';
        }
    }


    private function items(){
        $this->items = ItemRepository::list(request()->route('order'), $this->search);
    }


    private function select_products(){
        $this->select_products = ProductRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('search', $this->search);
        $view->with('items', $this->items);
        $view->with('select_products', $this->select_products);
    }

}