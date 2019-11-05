<div class="modal fade" id="modal_order_items_edit_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			@if(isset($order_item))
			{{ Form::model($order_item, ['route' => ['order_items.update', $order_item], 'method' => 'put']) }}
			@else
			{{ Form::open(['route' => 'order_items.store']) }}
			@endif
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">{{ 'Adiconar Item/Editando Item' }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ Form::select('product_category_id', [1,2,3,4], old('product_category_id'),['class' => 'form-control', 'placeholder' => 'Selecione um Produto']) }}
				</div>
				<div class="form-group mb-0">
					{{ Form::number('qty', 0, ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="modal-footer  justify-content-start">
				{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>