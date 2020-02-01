<?php

namespace Modules\Order\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Order\Entities\Item;

class ItemAfterDiscountParseEvent
{
    use SerializesModels;

    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

  
    public function item()
    {
        return $this->item;
    }
}
