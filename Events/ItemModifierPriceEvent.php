<?php

namespace Modules\Order\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Order\Entities\Item;

class ItemModifierPriceEvent
{
    use SerializesModels;

    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getItem()
    {
        return $this->item;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
