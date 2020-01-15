<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Saller\Entities\Saller;
use Modules\Order\Entities\OrderSaller;


class RelationshipServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Saller::addDynamicRelation('order_sallers', function (Saller $saller) {
            return $saller->hasMany(OrderSaller::class);
        });
    }



    public function register()
    {

    }

}
