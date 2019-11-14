<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $guarded = [];

	const ABERTO = 1;
	const CONCLUIDO = 2;
	const CANCELADO = 3;
	const RESERVADO = 4;

	public function getColorAttribute($value)
	{
		$color = '';
		switch ($this->id) {
			case self::ABERTO:
			$color =  'success';
			break;
			case self::CONCLUIDO:
			$color = 'primary';
			break;
			case self::CANCELADO:
			$color = 'danger';
			break;
			case self::RESERVADO:
			$color = 'info';
			break;			
			default:
			break;
		}

		return $color;
	}

}
