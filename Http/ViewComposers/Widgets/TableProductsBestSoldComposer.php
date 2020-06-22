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

        // begin
        $items = ItemRepository::loadByClosedOrders();
        $items->load('product');

        $items_grouped = $items->groupBy(function ($item) {
            return $item->product_id;
        });

        foreach ($items_grouped as $items) {
            $product = $this->productStructure($items->first());

            foreach ($items as $item) {
                $product->qty += $item->qty;
                $product->discount_value += $item->discount_value;
                $product->addition_value += $item->addition_value;
                $product->total += $item->total;
            }

            $this->products->push($product);
        }

    }

    private function productStructure($item)
    {
        return (object) [
                'image' => $item->product->image,
                'description' => $item->product->description,
                'price' => $item->product->price,
                'discount_value' => 0,
                'addition_value' => 0,
                'qty' => 0,
                'total' => 0,
            ];
    }

    public function view($view){
        $view->with('products', $this->products);
    }

}