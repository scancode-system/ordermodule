<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $guarded = [];

	const OPEN = 1;
	const COMPLETED = 2;
	const CANCELED = 3;
	const RESERVED = 4;

	public function getColorAttribute($value)
	{
		$color = '';
		switch ($this->id) {
			case self::OPEN:
			$color =  'success';
			break;
			case self::COMPLETED:
			$color = 'primary';
			break;
			case self::CANCELED:
			$color = 'danger';
			break;
			case self::RESERVED:
			$color = 'info';
			break;			
			default:
			break;
		}

		return $color;
	}

}
