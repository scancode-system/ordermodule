<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\PriceModify;

class PriceModifyRepository
{

	// LOAD
	public static function loadByPriority()
	{
		return PriceModify::orderBy('priority', 'desc')->get();
	}

	// SAVE
	public static function store($data)
	{
		return PriceModify::create($data);
	}

	// DELETE
	public static function destroyByModule($module)
	{
		(PriceModify::where('module', $module)->first())->delete();
	}

}
