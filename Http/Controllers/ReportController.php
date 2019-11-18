<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Maatwebsite\Excel\Facades\Excel;
use Modules\Order\Exports\OrdersExport;

class ReportController extends Controller
{
    
    public function order(){
        return Excel::download(new OrdersExport, 'pedidos.xlsx');
    }

}
