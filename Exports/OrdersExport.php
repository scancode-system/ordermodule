<?php 
namespace Modules\Order\Exports;

use Modules\Order\Repositories\OrderRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class OrdersExport implements FromCollection, WithStrictNullComparison
{
    public function collection()
    {
        return new Collection($this->data());
    }


    private function data(){
    	return array_merge($this->header(), $this->body());
    }

    private function header(){
    	return [['codigo', 'concluido', 'total', 'pagamento', 'comprador', 'email', 'telefone', 'representante']];
    }


    private function body(){
    	$orders = OrderRepository::loadClosedOrders();
    	$body = [];

    	foreach ($orders as $order) {
    		array_push($body, [
    			$this->codigo($order),
                $this->concluido($order),
                $this->total($order),
                $this->pagamento($order),
                $this->comprador($order),
                $this->email($order),
                $this->telefone($order),
                $this->representante($order),
            ]);
    	}

        return (new Collection($body))->sortByDesc('total')->toArray();
    }

    private function codigo($order){
    	return $order->id;
    }

    private function concluido($order){
        return $order->closing_date;
    }

    private function total($order){
    	return $order->total;
    }

    private function pagamento($order){
        return $order->order_payment->description;
    }


    private function comprador($order){
    	return $order->order_client->buyer;
    }

    private function email($order){
    	return $order->order_client->email;
    }

    private function telefone($order){
    	return $order->order_client->phone;
    }

    private function representante($order){
    	return $order->order_saller->name;
    }

}