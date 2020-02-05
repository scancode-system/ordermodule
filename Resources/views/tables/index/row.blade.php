	<tr>
		<td class="align-middle">{{ '#'.$order->id }}</td>
		<td class="align-middle">{{ $order->order_client->corporate_name ?? 'N/A' }}</td>
		<td class="align-middle">{{ $order->order_client->buyer ?? 'N/A' }}</td>
		<td class="align-middle">{{ $order->order_saller->name ?? 'N/A'}}</td>
		<td class="align-middle text-center"><span class="badge badge-{{ $order->status->color }} badge-pill py-1 px-4">{{ $order->status->description }}</span></td>
		<td class="align-middle text-center">@currency($order->total)</td>
		<td class="align-middle text-center">{{ $order->closing_date ?? 'N/A' }}</td>

		<td class="text-right align-middle">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#orders_show_{{ $order->id }}"><i class="fa fa-eye"></i></button>
				<a href="{{ route('orders.edit', [$order->id, 0]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#orders_destroy_{{ $order->id }}"><i class="fa fa-trash-o"></i></button>
			</div>
		</td>
		@include('order::modals.modal_show_orders')
		@modal_destroy(['route_destroy' => 'orders.destroy', 'model' => $order->id, 'modal_id' => 'orders_destroy_'.$order->id])
	</tr>