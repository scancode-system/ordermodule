	<tr>
		<td class="align-middle">{{ '#1' }}</td>
		<td class="align-middle">{{ 'João' }}</td>
		<td class="align-middle">{{ 'Matheus' }}</td>
		<td class="align-middle text-center">{!! '<span class="badge badge-primary badge-pill py-1 px-4">Aberto</span>' !!}</td>
		<td class="align-middle text-center">@currency(1567.45)</td>


		<td class="text-right align-middle">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#orders_view_1"><i class="fa fa-eye"></i></button>
				<a href="{{ route('orders.edit', [1, 0]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#orders_destroy_1"><i class="fa fa-trash-o"></i></button>
			</div>
		</td>
		@include('order::modals.modal_orders_view')
		@modal_destroy(['route_destroy' => 'orders.destroy', 'model' => 1, 'modal_id' => 'orders_destroy_1'])
	</tr>