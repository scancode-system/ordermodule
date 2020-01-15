<?php

namespace Modules\Order\Observers;

use Modules\Order\Entities\OrderShippingCompany;
use Modules\Client\Entities\ShippingCompany;

class OrderShippingCompanyObserver
{

	/*public function creating(ShippingCompany $shipping_company)
	{
		$saller = Saller::find($order_saller->saller_id);

		$order_saller->name = $saller->name;
		$order_saller->email = $saller->email;
	}*/	


	public function updating(OrderShippingCompany $order_shipping_company)
	{
		$shipping_company = ShippingCompany::find($order_shipping_company->shipping_company_id);
		$order_shipping_company->description = $shipping_company->name;
	}


}
