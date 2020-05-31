<?php

namespace Modules\Order\Events;

use Illuminate\Queue\SerializesModels;

class UpdateManyItemsBeginEvent
{
    use SerializesModels;


    private $items;


    public function __construct($items)
    {
        $this->items = $items;
    }


    public function items()
    {
        return $this->items;
    }

}
