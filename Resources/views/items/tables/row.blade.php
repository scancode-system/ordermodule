	<tr>
		<td>
			<img src="{{ url($item->item_product->image) }}" alt="..." class="img-thumbnail" style="height: 75px;">
		</td>
		<td class="align-middle">{{ $item->item_product->sku }}</td>
		<td class="align-middle">{{ $item->item_product->description }}</td>
		<td class="align-middle text-center">@currency($item->price)</td>
		<td class="align-middle text-center">@currency($item->discount_value)</td>
		<td class="align-middle text-center">{{ $item->qty }} Unidades</td>
		<td class="align-middle text-center">@currency($item->total)</td>
		<td class="text-right align-middle">
			<div class="btn-group" role="group" aria-label="Basic example">
				{{ Form::button('<i class="fa fa-eye"></i>', ['class' => 'btn btn-secondary', 'data-toggle' => 'modal', 'data-target' => '#modal_view_items_'.$item->id]) }}
				{{ Form::button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#modal_edit_items_'.$item->id]) }}
				{{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#modal_destroy_items_'.$item->id]) }}
			</div>
		</td>
		@include('order::items.modals.modal_view_items')
		@include('order::items.modals.modal_edit_items', ['modal_id' => 'modal_edit_items_'.$item->id, 'item' => $item])
		@modal_destroy(['route_destroy' => 'items.destroy', 'model' => $item->id, 'modal_id' => 'modal_destroy_items_'.$item->id])
	</tr>