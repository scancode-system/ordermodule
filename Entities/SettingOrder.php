<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class SettingOrder extends Model
{

	protected $table = 'setting_order';
    protected $fillable = ['id', 'order_start', 'statement_responsibility', 'global_observation', 'number_copies'];

}
