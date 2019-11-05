	<tr>
		<td>
			<img src="https://www.e-cadeiras.com.br/ccstore/v1/images/?source=/file/v4727738909922050738/products/EC000013173%20-%20CADEIRA%20PRESIDENTE%20CORINTO%20CINZA%20E%20BRANCA-1.jpg&height=777&width=585" alt="..." class="img-thumbnail" style="height: 75px;">
		</td>
		<td class="align-middle">{{ 'CAC055' }}</td>
		<td class="align-middle">{{ 'Prato Branco Redondo' }}</td>
		<td class="align-middle">@currency(1567.45)</td>
		<td class="align-middle text-center">{{ '5' }} Unidades</td>
		<td class="align-middle text-center">@currency(23567.45)</td>
		<td class="text-right align-middle">
			<div class="btn-group" role="group" aria-label="Basic example">
				{{ Form::button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-secondary', 'data-toggle' => 'modal', 'data-target' => '#modal_order_items_view_1']) }}
				{{ Form::button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modal_order_items_edit_1']) }}
				{{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#modal_order_items_destroy_1']) }}
			</div>
		</td>
		@include('order::modals.modal_order_items_view')
		@include('order::modals.modal_order_items_edit')
		@modal_destroy(['route_destroy' => 'order_items.destroy', 'model' => 1, 'modal_id' => 'modal_order_items_destroy_1'])
	</tr>