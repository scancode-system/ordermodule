<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\ItemTax;


class ItemTaxRepository
{


	// CREATE
	public static function store($data){
		return ItemTax::create($data);
	}

}
