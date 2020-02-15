<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Saller\Entities\Saller;
use Modules\Order\Entities\OrderSaller;

use Modules\Product\Entities\Product;
use Modules\Order\Entities\Item;


class RelationshipServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Saller::addDynamicRelation('order_sallers', function (Saller $saller) {
            return $saller->hasMany(OrderSaller::class);
        });

        Product::addDynamicRelation('items', function (Product $product) {
            return $product->hasMany(Item::class);
        });
    }



    public function register()
    {

    }

}
