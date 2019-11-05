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
		{{  Form::open(['route' => 'order_items.store']) }}
		{{ Form::button('<i class="fa fa-plus-square-o"></i><span>Novo Item</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
		{{ Form::close() }}
	</div>
</div>
<table class="table table-responsive-sm bg-white table-hover border">
	@include('order::tables.edit.header')
	<tbody>
		@include('order::tables.edit.row')
	</tbody>
</table>
<ul class="pagination mb-0">
	<li class="page-item">
		<a class="page-link" href="#">Anterior</a>
	</li>
	<li class="page-item active">
		<a class="page-link" href="#">1</a>
	</li>
	<li class="page-item">
		<a class="page-link" href="#">2</a>
	</li>
	<li class="page-item">
		<a class="page-link" href="#">3</a>
	</li>
	<li class="page-item">
		<a class="page-link" href="#">4</a>
	</li>
	<li class="page-item">
		<a class="page-link" href="#">Proximo</a>
	</li>
</ul>