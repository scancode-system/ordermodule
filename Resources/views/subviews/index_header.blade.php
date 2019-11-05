<div class="card-header">
	<div class="row">
		<div class="col">
			{{  Form::open(['route' => 'orders.index']) }}
			{{ Form::select('order_status_id', ['Aberto', 'Cancelado'], null, ['class' => 'form-control']) }}
			{{ Form::close() }}
		</div>
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
			{{  Form::open(['route' => 'orders.store']) }}
			{{ Form::button('<i class="fa fa-plus-square-o"></i><span>Novo Pedido</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>