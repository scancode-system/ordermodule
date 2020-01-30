<?php

namespace Modules\Order\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Order\Entities\Item;

class ItemControllerAfterStoreEvent
{
    use SerializesModels;

    private $item;
    private $data;

    public function __construct(Item $item, $data)
    {
        $this->item = $item;
        $this->data = $data;
    }

    public function item()
    {
        return $this->item;
    }

    public function data()
    {
        return (object)$this->data;
    }
}


