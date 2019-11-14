<div class="row mb-3">
	<div class="col">
		{{  Form::open(['route' => 'orders.index']) }}
		<div class="input-group">
			<span class="input-group-prepend">
				{{ Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
			</span>
			{{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Pesquisar']) }}
		</div>
		{{ Form::close() }}
	</div>
	<div class="col text-right">
		<a href="#" class="btn btn-brand btn-primary" data-toggle="modal" data-target="#modal_create_order_items"><i class="fa fa-plus-square-o"></i><span>Novo Item</span></a>
	</div>
</div>
<table class="table table-responsive-sm bg-white table-hover border">
	@include('order::items.tables.header')
	<tbody>
		@foreach($items as $item)
			@include('order::items.tables.row')
		@endforeach
	</tbody>
</table>
{{ $items->links() }}

@include('order::items.modals.modal_create_items', ['modal_id' => 'modal_create_order_items', 'item' => null])