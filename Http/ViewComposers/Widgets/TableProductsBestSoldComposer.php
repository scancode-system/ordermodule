<?php

namespace Modules\order\Http\ViewComposers\Widgets;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Product\Repositories\ProductRepository;
use Modules\Order\Repositories\ItemRepository;
use Illuminate\Support\Collection;

class TableProductsBestSoldComposer extends ServiceComposer {

    private $products;

    public function assign($view){
        $this->products();
    }

    private function products(){
        $this->products = new Collection();
        $products = ProductRepository::loadAll();
        foreach ($products as $product) {
            $data = (object) [
                'image' => $product->image,
                'description' => $product->description,
                'price' => $product->price,
                'discount_value' => 0,
                'addition_value' => 0,
                'qty' => 0,
                'total' => 0,
            ];

            $items = ItemRepository::loadSoldItemsByProduct($product);

            foreach ($items as $item) {
                $data->qty += $item->qty;
                $data->discount_value += $item->discount_value;
                $data->addition_value += $item->addition_value;
                $data->total += $item->total;
            }

            $this->products->push($data);
        }

        $this->products = $this->products->sortByDesc('total')->slice(0,5);

    }

    public function view($view){
        $view->with('products', $this->products);
    }

}