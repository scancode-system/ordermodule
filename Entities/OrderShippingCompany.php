<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderShippingCompany extends Model
{
    protected $fillable = ['order_id', 'shipping_company_id'];
}
