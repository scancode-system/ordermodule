<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class OrderItemController extends Controller
{


    public function index()
    {
        return view('order::index');
    }

    public function edit(Request $request, $id, $tab = 0)
    {
        return view('orders::edit');
    }

}
