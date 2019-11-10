<div class="card-header">
	<div class="row">
		<div class="col">
			{{  Form::open(['route' => 'orders.index']) }}
			<div class="input-group">
				<span class="input-group-prepend">
					{{ Form::button('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
				</span>
				{{ Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Pesquisar']) }}
			</div>
			{{ Form::close() }}
		</div>
		<div class="col text-right">
			<a href="#" class="btn btn-brand btn-primary" data-toggle="modal" data-target="#modal_create_order"><i class="fa fa-plus-square-o"></i><span>Novo Pedido</span></a>
			@include('order::modals.modal_create_order')
		</div>
	</div>
</div>