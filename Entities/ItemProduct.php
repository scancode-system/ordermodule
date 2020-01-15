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
		$extensions = ['jpg'];
		foreach ($extensions as $extension) {
			if(Storage::disk('public')->exists('produtos/'.$this->sku.'.'.$extension)){
				return 'storage/produtos/'.$this->sku.'.'.$extension; 
			}	
		}
		return 'modules/dashboard/img/noimage.png';
	}

}
