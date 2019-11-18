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
    	return [['codigo', 'total', 'comprador', 'email', 'telefone', 'razao_social', 'cpf_cnpj', 'representante']];
    }


    private function body(){
    	$orders = OrderRepository::loadClosedOrders();
    	$body = [];

    	foreach ($orders as $order) {
    		array_push($body, [
    			$this->codigo($order),
    			$this->total($order),
    			$this->comprador($order),
    			$this->email($order),
    			$this->telefone($order),
    			$this->razao_social($order),
    			$this->cpf_cnpj($order),
    			$this->representante($order),
    		]);
    	}

    	return $body;
    }

    private function codigo($order){
    	return $order->id;
    }

    private function total($order){
    	return $order->total;
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

    private function razao_social($order){
    	return $order->order_client->corporate_name;
    }

    private function cpf_cnpj($order){
    	return $order->order_client->cpf_cnpj;
    }

    private function representante($order){
    	return $order->order_saller->name;
    }

}