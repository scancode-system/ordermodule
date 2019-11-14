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
        OrderRepository::store($request->all());
        return redirect()->route('orders.index')->with('success', 'Pedido cadastrado.');
    }    


    public function edit(Request $request, Order $order, $tab = 0)
    {
        return view('order::edit');
    }


    public function update(OrderRequest $request, Order $order){
        OrderRepository::update($order, $request->all());
        return back()->with('success', 'Pedido atualizado.');
    }  


    public function destroy(Request $request, Order $order){
        OrderRepository::destroy($order);
        return back()->with('success', 'Pedido deletado.');
    }

}
