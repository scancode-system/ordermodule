<table class="table table-hover table-striped table-borderless">
	<thead class="thead-dark">
				<tr>
					<th colspan="2">Informações</th>
				</tr>
			</thead>
	<tbody>
		<tr>
			<td>Código</td>
			<td>{{ $order->order_saller->saller_id }}</td>
		</tr>
		<tr>
			<td>Nome</td>
			<td>{{ $order->order_saller->name  ?? 'N/A' }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $order->order_saller->email  ?? 'N/A'}}</td>
		</tr>
		<tr>
			<td>Telefone</td>
			<td>{{ $order->order_saller->phone  ?? 'N/A'}}</td>
		</tr>
	</tbody>
</table>
<a href="#" class="btn btn-brand btn-primary" data-toggle="modal" data-target="#modal_edit_order_saller"><i class="fa fa-refresh"></i><span>Selecionar um Representante</span></a>
@include('order::modals.modal_edit_order_saller')