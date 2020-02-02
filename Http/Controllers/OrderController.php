<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Http\Requests\OrderRequest;
use Modules\Order\Repositories\OrderRepository;
use Modules\Order\Repositories\ItemRepository;
use Modules\Order\Entities\Order;
use Modules\Order\Services\PDFService;
use \Exception;


class OrderController extends Controller
{

    public function index()
    {
        return view('order::index');
    }


    public function store(OrderRequest $request){
        $order = OrderRepository::store($request->all());
        return redirect()->route('orders.edit', $order)->with('success', 'Pedido de código #'.$order->id.' cadastrado.');
    }    


    public function edit(Request $request, Order $order, $tab = 0)
    {
        return view('order::edit');
    }


    public function update(OrderRequest $request, Order $order){
        try{
            OrderRepository::update($order, $request->all());
            return back()->with('success', 'Pedido atualizado.');
        } catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }  



    }  


    public function destroy(Request $request, Order $order){
        foreach ($order->items as $item) {
            ItemRepository::destroy($item);
        }
        OrderRepository::destroy($order);
        return back()->with('success', 'Pedido deletado.');
    }

    public function destroyClean(Request $request)
    {
        try{
            $deleted_count = OrderRepository::clean();
            return back()->with('success', $deleted_count. ' pedidos deletado(s).');
        } catch (Exception $e){
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function clone(Request $request, Order $order){
        try{
            $new_order = OrderRepository::clone($order);
            return redirect()->route('orders.edit', $new_order)->with('success', 'Pedido '.$new_order->id.' criado como clone do pedido '.$order->id.'.');
        } catch (Exception $e){
            return back()->withErrors(['O Pedido não pode ser totalmente clonado, pois não há estoque suficiente de produtos.']);
        }     
    }

}
