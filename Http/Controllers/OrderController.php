<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Http\Requests\OrderRequest;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{

    public function index()
    {
        return view('order::index');
    }


    public function store(OrderRequest $request){
        OrderRepository::storeClientSaller($request->client_id, $request->saller_id);
        return redirect()->route('orders.index')->with('success', 'Pedido cadastrado.');
    }    


    public function edit(Request $request, $id, $tab = 0)
    {
        return view('order::edit');
    }

}
