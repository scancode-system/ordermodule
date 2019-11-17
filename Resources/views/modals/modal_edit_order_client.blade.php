<div class="modal fade" id="modal_edit_order_client" tabindex="-1" role="dialog" aria-labelledby="modal_edit_order_client" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			{{ Form::open(['route' => ['orders.update', $order], 'method' => 'put']) }}
			<div class="modal-header">
				<h5 class="modal-title">Selecionar um cliente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-left">
				<div class="form-group">
					{{ Form::select('client_id', $select_clients, $order->order_client->client_id, ['class' => 'form-control select2-single', 'id' => 'select_clients']) }}
				</div>
			</div>
			<div class="modal-footer  justify-content-start">
				{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@push('styles')
{{ Html::style('modules/dashboard/coreui/vendors/select2/css/select2.min.css') }} 
@endpush()


@push('scripts')
{{ Html::script('modules/dashboard/coreui/node_modules/select2/dist/js/select2.min.js') }}
<script>
	$('#select_clients').select2({
		theme: 'bootstrap'
	});
</script>
@endpush()

