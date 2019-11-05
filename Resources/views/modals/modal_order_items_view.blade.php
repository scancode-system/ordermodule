@modal_view(['modal_id' => 'modal_order_items_view_1'])

@slot('title')
Pedido #{{ '1' }}
@endslot
<div class="d-flex justify-content-center mb-3">
	<img src="https://www.e-cadeiras.com.br/ccstore/v1/images/?source=/file/v4727738909922050738/products/EC000013173%20-%20CADEIRA%20PRESIDENTE%20CORINTO%20CINZA%20E%20BRANCA-1.jpg&height=777&width=585" alt="..." class="img-thumbnail w-50">
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Referencia: </strong></div>
	<div class="col">{{ 'CAC050' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Descricao: </strong></div>
	<div class="col">{{ 'Colher de Sopa 20ml' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Quantidade: </strong></div>
	<div class="col">{{ '2' }}</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Preço: </strong></div>
	<div class="col">@currency(1567.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Descontos: </strong></div>
	<div class="col">@percentage('34.54') - @currency(67.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Acrescimos: </strong></div>
	<div class="col">@percentage('34.54') - @currency(67.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Impostos: </strong></div>
	<div class="col">@percentage('34.54') - @currency(67.45)</div>
</div>
<div class="row justify-content-center mb-2">
	<div class="col"><strong>Total Bruto: </strong></div>
	<div class="col">@currency(1567.45)</div>
</div>
<div class="row justify-content-center">
	<div class="col"><strong>Total: </strong></div>
	<div class="col">@currency(1567.45)</div>
</div>

@endmodal_view