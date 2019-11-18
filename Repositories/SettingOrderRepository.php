<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\SettingOrder;


class SettingOrderRepository
{

	public static function load(){
		return $setting_order = SettingOrder::first();
	}

	public static function update($data){
		(SettingOrder::first())->update($data);
	}

}
