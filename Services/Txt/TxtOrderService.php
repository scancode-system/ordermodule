<?php

namespace Modules\Order\Services\Txt;

use Illuminate\Support\Facades\Storage;
use Modules\Order\Repositories\OrderRepository;
use Modules\Dashboard\Services\Txt\TxtService;
use  ZipArchive;

class TxtOrderService extends TxtService
{

	public function build()
	{
		$orders = OrderRepository::loadClosedOrders();

		foreach ($orders as $order) 
		{
			$this->header($this->file_path($order), $order);
			foreach ($order->items as $item) 
			{
				$this->item($this->file_path($order), $item);
			}
		}
	}

	private function header($file_path, $order)
	{
		Storage::append($file_path, 
			'*'.
			mb_substr(addString($order->id, 7, '0'), 0, 7).
			mb_substr(addString($order->order_client->client_id, 10, '0'), 0, 10).
			mb_substr(addString($order->order_saller->saller_id, 10, '0'), 0, 10).
			mb_substr(addString($order->order_payment->payment_id, 10, '0'), 0, 10).
			mb_substr($order->closing_date, 8, 2).
			mb_substr($order->closing_date, 5, 2) .
			mb_substr($order->closing_date, 0, 4) . 
			mb_substr($order->closing_date, 11, 2).
			mb_substr($order->closing_date, 14, 2));
	}

	private function item($file_path, $item)
	{
		Storage::append($file_path,
			mb_substr(addString($item->product->barcode, 20, ' ', false), 0, 20).
			mb_substr(addString($item->qty, 6, '0'), 0, 6).
			mb_substr(addString(str_replace('.', '', $item->price), 8, '0'), 0, 8).
			mb_substr(addString(preg_replace('/[^0-9]/', '', $item->discount), 5, '0'), 0, 5).
			mb_substr(addString(preg_replace('/[^0-9]/', '', $item->addition), 5, '0'), 0, 5)			
			);
	}
		

	private function file_path($order)
	{
		return $this->path_base.'/'.addString($order->id, 7, '0') . '.txt';
	}

	

}
