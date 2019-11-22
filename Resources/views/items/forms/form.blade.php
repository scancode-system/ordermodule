@if(isset($item))
{{ Form::model($item, ['route' => ['items.update', $item], 'method' => 'put']) }}
{{ Form::hidden('id', $item->id) }}
@else
{{ Form::open(['route' => ['items.store', $order]]) }}
@endif
{{ Form::hidden('order_id', $order->id) }}
<div class="modal-body">
	<div class="form-group">
		@if(isset($item))
		{{ Form::select('product_id', $select_products, $item->product_id, ['class' => 'form-control', 'id' => 'select_products', 'placeholder' => 'Selecione um Produto', 'disabled' => 'disabled']) }}
		@else
		{{ Form::select('product_id', $select_products, old('product_id'), ['class' => 'form-control', 'id' => 'select_products', 'placeholder' => 'Selecione um Produto']) }}
		@endif
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group mb-0">
				{{ Form::label('qty', 'Quantidade') }}
				@if(isset($item))
				{{ Form::number('qty', $item->qty, ['class' => 'form-control']) }}
				@else
				{{ Form::number('qty', old('qty', 1), ['class' => 'form-control']) }}
				@endif
			</div>
		</div>
		<div class="col">
			<div class="form-group mb-0">
				{{ Form::label('discount', 'Desconto') }}
				@if(isset($item))
				{{ Form::number('discount', $item->discount, ['class' => 'form-control']) }}
				@else
				{{ Form::number('discount', old('discount', 0), ['class' => 'form-control']) }}
				@endif
			</div>
		</div>
	</div>
</div>
<div class="modal-footer  justify-content-start">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}




<!-- Styles and Scripts -->
@push('styles')
{{ Html::style('modules/dashboard/coreui/vendors/select2/css/select2.min.css') }} 

@endpush()

@push('scripts')
{{ Html::script('modules/dashboard/coreui/node_modules/select2/dist/js/select2.min.js') }}
<script>
	$('#select_clients, #select_products').select2({
		theme: 'bootstrap'
	});
</script>
@endpush()

