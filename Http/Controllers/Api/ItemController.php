<?php

namespace Modules\Order\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Item;
use Modules\Product\Entities\Product;
use Modules\Order\Repositories\ItemRepository;
use Modules\Order\Http\Requests\ItemRequest;
use Modules\Order\Events\ItemControllerAfterStoreEvent;
use Modules\Order\Events\ItemControllerBeforeUpdateEvent;
use Modules\Order\Events\UpdateManyItemsBeginEvent;
use Exception;
use Illuminate\Validation\Rule;
use Modules\Order\Rules\Multiple;
use Illuminate\Validation\ValidationException;

class ItemController extends Controller
{

    public function store(ItemRequest $request, Order $order)
    {
        $item = ItemRepository::store($request->all());
        event(new ItemControllerAfterStoreEvent($item, $request->all())); // faz nada a principio

        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($item->order_id);
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total;
            $item->price_net = $item->price_net;
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->discount = $item->discount;
            $item->addition_value = $item->addition_value;
            $item->addition = $item->addition;
        }


        $messages = collect(session()->pull('messages_warning'))->values();
        return ['order' => $order, 'messages' => $messages];
    }

    public function update(ItemRequest $request, Item $item)
    {
        event(new ItemControllerBeforeUpdateEvent($item, $request->all())); // faz nada a principio
        ItemRepository::update($item, $request->all());
        
        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($item->order_id); 
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total;
            $item->price_net = $item->price_net;
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->addition_value = $item->addition_value;
        }

        $messages = session()->pull('messages_warning');
        return ['order' => $order, 'messages' => $messages];
    }

    public function updateMany(Request $request, Order $order) // Depois tem que criar uma validação aqui neh, provavelmente nao vai ser requestFORM mas algo MANUAL IMPORTANTE
    {

        if(count($request->all()) > 0){
            $fails = collect([]);
            event(new UpdateManyItemsBeginEvent($request->all()));
            ItemRepository::destroy_family($order->id, (Product::find($request->all()[0]['product_id']))->sku);


            foreach ($request->all() as $item_raw) {
                try {
                    $this->validationMany($item_raw, $order);
                    $item = ItemRepository::store($item_raw);
                    event(new ItemControllerAfterStoreEvent($item, $item_raw));
                } catch (Exception $e) {
                    $fails->push($e->getMessage());
                }
            }

            $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($order->id); 
            $order->total = $order->total;
            foreach ($order->items as $item) {
                $item->total = $item->total;
                $item->price_net = $item->price_net;
                $item->tax_value = $item->tax_value;
                $item->discount_value = $item->discount_value;
                $item->addition_value = $item->addition_value;
            }

            return ['order' => $order, 'fails' => $fails];
        } else {
            throw new Exception('Selecione ao menos algum item da grade.');
        }

    }

    public function validationMany($data, $order){
        $order_id = $order->id;
        $product = Product::find($data['product_id']);

        $product_id;
        $min_qty;
        $multiple;

        if($product){
            $product_id = $product->id;
            $min_qty = $product->min_qty;
            $multiple = $product->multiple;
        }


        $validator = Validator::make($data, [
            'product_id' => ['required', 'integer', 'min:1', Rule::unique('items')->where(function ($query) use ($order_id, $product_id) {
                return $query->where('order_id', $order_id)
                ->where('product_id', $product_id);
            })],
            'qty' => ['required', 'integer', 'min:'.$min_qty, new Multiple($multiple)],
            'discount' => 'numeric|min:0|max:100|regex:/^\d+(\.\d{1,2})?$/'
        ], [
            'qty.min' => 'A quantidade precisa ser no mínimo :min',
            'product_id.unique' => 'Este produto já está no pedido.',
            'discount.numeric' => 'Desconto precisa ser numérico',
            'discount.max' => 'Desconto não pode ser maior que :max',
            'discount.min' => 'Desconto não pode ser menor que :min',
        ]);

        if ($validator->fails()) {

            //dd('Produto "'.$product->description.'" não pode ir para sacola ('. $validator->errors()->first().')');
            //dd($validator->first());
            
            throw new Exception('Produto "'.$product->description.'" não pode ir para sacola ('. $validator->errors()->first().')');
        }
    }

    public function destroy(Request $request, Item $item){
        $order_id = $item->order->id;
        ItemRepository::destroy($item);

        $order = Order::with(['order_payment', 'order_shipping_company', 'order_client', 'items', 'items.item_product', 'status'])->find($order_id); 
        $order->total = $order->total;
        foreach ($order->items as $item) {
            $item->total = $item->total; 
            $item->price_net = $item->price_net;  
            $item->tax_value = $item->tax_value;
            $item->discount_value = $item->discount_value;
            $item->addition_value = $item->addition_value;
        }
        return $order;
    }

}
