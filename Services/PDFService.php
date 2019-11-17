<?php 

namespace Modules\Order\Services;


use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Modules\Order\Entities\Order;
use Modules\Dashboard\Repositories\CompanyRepository;

use Nwidart\Modules\Facades\Module;

class PDFService {

	private $order;
	private $pdf;

	public function __construct(Order $order) {
		$this->order = $order;
		$this->pdf = PDF::loadView($this->getView(), ['order' => $this->order, 'company' => CompanyRepository::company()]);
	}

	private function getView(){
		$view = 'order::pdf.order';
		$modules = Module::allEnabled();
		unset($modules['Order']);
		foreach ($modules as $module) {
			$module_pdf_view = $module->getLowerName().'::pdf.order'; 
			if(view()->exists($module_pdf_view)){
				$view = $module_pdf_view;
			}
		}
		return $view;

	}

	public function download(){
		return $this->pdf->inline('pedido_'.$this->order->id.'.pdf');
	}

}