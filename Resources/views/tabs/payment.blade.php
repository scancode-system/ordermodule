@if(is_null($order->order_payment->payment_id))
<div class="alert alert-warning" role="alert">
	PAGAMENTO NÃO INFORMADO
</div>
@else
<table class="table table-hover table-striped table-borderless">
	<thead class="thead-dark">
		<tr>
			<th colspan="2">Informações</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Código</td>
			<td>{{ $order->order_payment->payment_id }}</td>
		</tr>
		<tr>
			<td>Descrição</td>
			<td>{{ $order->order_payment->description }}</td>
		</tr>
		<tr>
			<td>Valor Mínimo</td>
			<td>@currency($order->order_payment->min_value)</td>
		</tr>
		<tr>
			<td>Desconto</td>
			<td>@percentage($order->order_payment->discount)</td>
		</tr>
		<tr>
			<td>Acréscimo</td>
			<td>@percentage($order->order_payment->addition)</td>
		</tr>
	</tbody>
</table>
@endif
<a href="#" class="btn btn-brand btn-primary" data-toggle="modal" data-target="#modal_edit_order_payment"><i class="fa fa-refresh"></i><span>Selecionar um Pagmento</span></a>
@include('order::modals.modal_edit_order_payment')