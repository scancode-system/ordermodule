@modal_view(['modal_id' => 'orders_show_'.$order->id, 'edit_route' => 'orders.edit', 'model_id' => $order->id])

@slot('title')
Pedido #{{ $order->id }}
@endslot

<h5>Informações</h5>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Cliente: </strong></div>
	<div class="col">{{ $order->order_client->corporate_name ?? 'N/A' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Comprador: </strong></div>
	<div class="col">{{ $order->order_client->buyer ?? 'N/A' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Representante: </strong></div>
	<div class="col">{{ $order->order_saller->name ?? 'N/A' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Status: </strong></div>
	<div class="col"><span class="badge badge-{{ $order->status->color }} badge-pill py-1 px-4">{{ $order->status->description }}</span></div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Items: </strong></div>
	<div class="col">{{ $order->number_items }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Transportadora: </strong></div>
	<div class="col">{{ $order->order_shipping_company->description ?? 'N/A' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Entrega: </strong></div>
	<div class="col">{{ $order->delivery_name }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Abertura: </strong></div>
	<div class="col">{{ $order->created_at }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Fechamento: </strong></div>
	<div class="col">{{ $order->closing_date ?? 'N/A' }}</div>
</div>
<hr>
<h5>Valores</h5>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Total Bruto: </strong></div>
	<div class="col">@currency($order->total_gross)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Desconto: </strong></div>
	<div class="col">@currency($order->discount_value)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Acréscimo: </strong></div>
	<div class="col">@currency($order->addition_value)</div>
</div>
<div class="row justify-content-center">
	<div class="col"><strong>Total: </strong></div>
	<div class="col">@currency($order->total)</div>
</div>

@endmodal_view