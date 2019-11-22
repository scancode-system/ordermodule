<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Maatwebsite\Excel\Facades\Excel;
use Modules\Order\Exports\OrdersExport;
use Modules\Order\Exports\OrdersFullExport;
use Modules\Order\Exports\ItemsExport;
use Modules\Order\Exports\ItemsFullExport;
use Modules\Order\Exports\ProductsExport;
use Modules\Order\Exports\ProductsFullExport;


class ReportController extends Controller
{

	public function orders(){
		return Excel::download(new OrdersExport, 'Pedidos Simples.xlsx');
	}

	public function ordersFull(){
		return Excel::download(new OrdersFullExport, 'Pedidos Detalhado.xlsx');
	}

	public function items(){
		return Excel::download(new ItemsExport, 'Pedidos Items Simples.xlsx');
	}

	public function itemsFull(){
		return Excel::download(new ItemsFullExport, 'Pedidos Items Detalhado.xlsx');
	}

	public function products(){
		return Excel::download(new ProductsExport, 'Produtos Simples.xlsx');
	}

	public function productsFull(){
		return Excel::download(new ProductsFullExport, 'Produtos Detalhado.xlsx');
	}

}
