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
		{{ Form::text('product_id', $item->item_product->description, ['class' => 'form-control', 'disabled' => 'disabled']) }}

		@else

		{{ Form::select('product_id', [], null, ['class' => 'form-control select2-single', 'id' => 'select_products', 'placeholder' => 'Selecione um Produto', 'style' => 'width:100%']) }}

		@endif
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				{{ Form::label('qty', 'Quantidade') }}
				@if(isset($item))
				{{ Form::number('qty', $item->qty, ['class' => 'form-control']) }}
				@else
				{{ Form::number('qty', old('qty', 1), ['class' => 'form-control']) }}
				@endif
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				{{ Form::label('discount', 'Desconto') }}
				@if(isset($item))
				{{ Form::number('discount', $item->discount, ['class' => 'form-control', 'step' => '0.01']) }}
				@else
				{{ Form::number('discount', old('discount', 0), ['class' => 'form-control', 'step' => '0.01']) }}
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group mb-0">
				{{ Form::label('observation', 'Observação do Item') }}
				@if(isset($item))
				{{ Form::text('observation', $item->observation, ['class' => 'form-control', 'placeholder' => 'Observação do Item']) }}
				@else
				{{ Form::text('observation', old('observation'), ['class' => 'form-control', 'placeholder' => 'Observação do Item']) }}
				@endif
			</div>
		</div>
	</div>
	<div id="{{ $modal_id }}_info">
		@if(isset($item))
		@include('order::items.info', ['product' => $item->product])
		@endif
	</div>
</div>
<div class="modal-footer  justify-content-start">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}




<!-- Styles and Scripts -->

@push('styles')
@if(!isset($item))
{{ Html::style('modules/dashboard/coreui/vendors/select2/css/select2.min.css') }} 
@endif
@endpush()

@push('scripts')
@if(!isset($item))
{{ Html::script('modules/dashboard/coreui/node_modules/select2/dist/js/select2.min.js') }}
<script>
	

	$('#select_products').select2({
		ajax: {
			url: function (params) {
				return '{{ url("/") }}/products/select/' + params.term;
			},
			dataType: 'json',
			delay: 250,
			cache: true,
			processResults: function (data) {
				return {
					results: data
				};
			}
		},
		minimumInputLength: 1,
		theme: 'bootstrap'
	});


	$('#select_products').change(function(){
		$("#{{ $modal_id }}_info").load("{{ url('/') }}/items/"+this.value+"/edit/info/ajax");
	});
</script>
@endif
@endpush()

