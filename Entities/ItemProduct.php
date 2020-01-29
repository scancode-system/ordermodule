<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Item;
use Illuminate\Support\Facades\Storage;

class ItemProduct extends Model
{
	protected $guarded = [];

		protected $appends = ['image'];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}


	public function getImageAttribute()
	{
		if(Storage::disk('public')->exists('produtos/'.$this->sku.'.jpg'))
		{
			return 'storage/produtos/'.$this->sku.'.jpg'; 
		} elseif(Storage::disk('public')->exists('produtos/'.$this->item->product->barcode.'.jpg'))
		{
			return 'storage/produtos/'.$this->item->product->barcode.'.jpg';
		}
		return 'modules/dashboard/img/noimage.png';
	}

}
 