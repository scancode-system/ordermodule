<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\SettingOrder;
use Illuminate\Support\Facades\DB;


class SettingOrderObserver
{

	public function updated(SettingOrder $setting_order)
	{
		if($setting_order->isDirty('order_start')){
			DB::statement('ALTER TABLE orders AUTO_INCREMENT = '.$setting_order->order_start.';');
		}
	}


}
