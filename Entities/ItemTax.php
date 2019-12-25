<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Item;


class ItemTax extends Model
{
    protected $guarded = [];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

    public function getValueAttribute($value)
	{
		return ('Modules\\'.$this->module.'\Services\CalculateTaxService')::value($this);
	}

	public function getTotalValueAttribute($value)
	{
		return ('Modules\\'.$this->module.'\Services\CalculateTaxService')::value($this)*$this->item->qty;
	}
}
