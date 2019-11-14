<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Http\Requests\ItemRequest;
use Modules\Order\Repositories\ItemRepository;
use Modules\Order\Entities\Item;
use Modules\Order\Entities\Order;

class ItemController extends Controller
{

    public function index()
    {
        return view('order::items.index');
    }


    public function store(ItemRequest $request, Order $order){
        ItemRepository::store($request->all());
        return back()->with('success', 'Item cadastrado.');
    }    


    public function edit(Request $request, $id, $tab = 0)
    {
        return view('orders::items.edit');
    }


    public function update(ItemRequest $request, Item $item){
        ItemRepository::update($item, $request->all());
        return back()->with('success', 'Item atualizado.');
    }  


    public function destroy(Request $request, Item $item){
        ItemRepository::destroy($item);
        return back()->with('success', 'Item deletado.');
    }


}
