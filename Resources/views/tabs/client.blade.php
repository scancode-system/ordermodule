@if($order->order_client)
<div class="row">
	<div class="col">
		<table class="table table-hover table-striped table-borderless">
			<thead class="thead-dark">
				<tr>
					<th colspan="2">Informações</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Código</td>
					<td>{{ $order->order_client->client_id }}</td>
				</tr>
				<tr>
					<td>Nome Fantasia</td>
					<td>{{ $order->order_client->corporate_name ?? 'N/A' }}</td>
				</tr>
				<tr>
					<td>Razão Social</td>
					<td>{{ $order->order_client->fantasy_name  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>CPF/CNPJ</td>
					<td>{{ $order->order_client->cpf_cnpj  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Comprador</td>
					<td>{{ $order->order_client->buyer ?? 'N/A' }}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{ $order->order_client->email  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Telefone</td>
					<td>{{ $order->order_client->phone  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Transportadora</td>
					<td>{{ $order->order_shipping_company->description  ?? 'N/A'}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col">
		<table class="table table-hover table-striped table-borderless">
			<thead class="thead-dark">
				<tr>
					<th colspan="2">Endereço</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Rua</td>
					<td>{{ $order->order_client->order_client_address->street ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Número</td>
					<td>{{ $order->order_client->order_client_address->number ?? 'N/A' }}</td>
				</tr>
				<tr>
					<td>Complemento</td>
					<td>{{ $order->order_client->order_client_address->apartment  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Bairro</td>
					<td>{{ $order->order_client->order_client_address->neighborhood  ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>Cidade</td>
					<td>{{ $order->order_client->order_client_address->city ?? 'N/A' }}</td>
				</tr>
				<tr>
					<td>Estado</td>
					<td>{{ $order->order_client->order_client_address->st ?? 'N/A'}}</td>
				</tr>
				<tr>
					<td>CEP</td>
					<td>{{ $order->order_client->order_client_address->postcode  ?? 'N/A'}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endif
<a href="#" class="btn btn-brand btn-primary" data-toggle="modal" data-target="#modal_edit_order_client"><i class="fa fa-refresh"></i><span>Selecionar um Cliente</span></a>
@include('order::modals.modal_edit_order_client')

<!--

<h5>Endereço</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Rua: </strong></div>
	<div class="col-md-5">{{ 'Salamao' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Número: </strong></div>
	<div class="col-md-5">{{ '345' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Complemento: </strong></div>
	<div class="col-md-5">{{ '301' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Bairro: </strong></div>
	<div class="col-md-5">{{ 'Cascalho' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Cidade: </strong></div>
	<div class="col-md-5">{{ 'Rio Grande do Norte' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>UF: </strong></div>
	<div class="col-md-5">{{ 'MN' }}</div>
</div>
<div class="row justify-content-center mb-3">
	<div class="col-md-5"><strong>CEP: </strong></div>
	<div class="col-md-5">{{ '30112098' }}</div>
</div>
<hr>-->
