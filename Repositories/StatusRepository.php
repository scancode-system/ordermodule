<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Status;

class StatusRepository
{


	public static function toSelect($value, $description){
		return Status::pluck($description, $value);
	}


}
