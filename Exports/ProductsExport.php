<?php 
namespace Modules\Order\Exports;

use Modules\Product\Repositories\ProductRepository;
use Modules\Order\Repositories\ItemRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ProductsExport implements FromCollection, WithStrictNullComparison
{
    public function collection()
    {
        return new Collection($this->data());
    }


    private function data(){
    	return array_merge($this->header(), $this->body());
    }

    private function header(){
    	return [['Referência', 'Descrição', 'Categoria', 'Preço', 'Unidades Vendidas', 'Total Bruto', 'Total de Descontos', 'Total de Acréscimos', 'Total Final']];
    }


    private function body(){
        $products = ProductRepository::loadAll();
        $body = [];

        foreach ($products as $product) {
            $row = (object) [
                'referencia' => $product->sku,
                'descricao' => $product->description,
                'categoria' => $product->category,
                'preco' => $product->price,
                'quantidade' => 0,
                'total_bruto' => 0,
                'desconto_valor' => 0,
                'acrescimo_valor' => 0,
                'total' => 0,
            ];

            $items = ItemRepository::loadSoldItemsByProduct($product);

            foreach ($items as $item) {
                $row->quantidade += $item->qty;
                $row->total_bruto += $item->total_gross;
                $row->desconto_valor += $item->total_discount_value;
                $row->acrescimo_valor += $item->total_addition_value;
                $row->total += $item->total;
            }

            array_push($body, $row);
        }

        return (new Collection($body))->sortByDesc('total')->toArray();

    }


}