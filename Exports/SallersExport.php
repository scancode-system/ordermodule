<?php 
namespace Modules\Order\Exports;

use Modules\Saller\Repositories\SallerRepository;
use Modules\Order\Repositories\ItemRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class SallersExport implements FromCollection, WithStrictNullComparison
{
    public function collection()
    {
        return new Collection($this->data());
    }


    private function data()
    {
    	return array_merge($this->header(), $this->body());
    }

    private function header()
    {
    	return [['Representante', 'Total']];
    }


    private function body(){
        $sallers = SallerRepository::load();
        $body = [];

        foreach ($sallers as $saller) {
            $row = (object) [
                'name' => $saller->name,
                'total' => 0,
            ];

            $order_sallers = $saller->order_sallers;
            foreach ($order_sallers as $order_saller) {
                if($order_saller->order->status_id == 2)
                $row->total += $order_saller->order->total;
            }

            array_push($body, $row);
        }

        return (new Collection($body))->sortByDesc('total')->toArray();

    }


}