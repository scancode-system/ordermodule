@modal_view(['modal_id' => 'orders_view_1', 'edit_route' => 'orders.edit', 'model_id' => '2'])

@slot('title')
Pedido #{{ '1' }}
@endslot

<h5>Informações</h5>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Cliente: </strong></div>
	<div class="col">{{ 'João' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Representante: </strong></div>
	<div class="col">{{ 'Mateus' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Status: </strong></div>
	<div class="col"><span class="badge badge-primary badge-pill py-1 px-4">Aberto</span></div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Items: </strong></div>
	<div class="col">23</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Transportadora: </strong></div>
	<div class="col">{{ 'nepunocemo' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Entrega: </strong></div>
	<div class="col">{{ 'PARCIAL' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Abertura: </strong></div>
	<div class="col">23/34/2045</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Fechamento: </strong></div>
	<div class="col">23/34/2045</div>
</div>
<hr>
<h5>Valores</h5>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Total Bruto: </strong></div>
	<div class="col">@currency(1567.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Desconto: </strong></div>
	<div class="col">@currency(367.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Acréscimo: </strong></div>
	<div class="col">@currency(234.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Imposto: </strong></div>
	<div class="col">@currency(34.45)</div>
</div>
<div class="row justify-content-center">
	<div class="col"><strong>Total Final: </strong></div>
	<div class="col">@currency(2567.45)</div>
</div>

@endmodal_view