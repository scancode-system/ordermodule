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


<div class="row">
	<div class="col-6 col-lg-3">
		<div class="card mb-0">
			<div class="card-body p-0 d-flex align-items-center">
				<i class="fa fa-money bg-primary p-4 px-5 font-2xl mr-3"></i>
				<div>
					<div class="text-value-sm text-primary">@currency($order->total_gross)</div>
					<div class="text-muted text-uppercase font-weight-bold small">Total Bruto</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-lg-3">
		<div class="card mb-0">
			<div class="card-body p-0 d-flex align-items-center">
				<i class="fa fa-tag bg-info p-4 px-5 font-2xl mr-3"></i>
				<div>
					<div class="text-value-sm text-info">@currency($order->discount_value)</div>
					<div class="text-muted text-uppercase font-weight-bold small">Desconto</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-lg-3">
		<div class="card mb-0">
			<div class="card-body p-0 d-flex align-items-center">
				<i class="fa fa-line-chart bg-secondary p-4 px-5 font-2xl mr-3"></i>
				<div>
					<div class="text-value-sm text-secondary">@currency($order->addition_value)</div>
					<div class="text-muted text-uppercase font-weight-bold small">Acrescimo</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-lg-3">
		<div class="card mb-0">
			<div class="card-body p-0 d-flex align-items-center">
				<i class="fa fa-money bg-danger p-4 px-5 font-2xl mr-3"></i>
				<div>
					<div class="text-value-sm text-danger">@currency($order->total)</div>
					<div class="text-muted text-uppercase font-weight-bold small">Total</div>
				</div>
			</div>
		</div>
	</div>
</div>

