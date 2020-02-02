<div class="tab-pane {{ ($tab=='order_setting_info')?'show active':'' }}" >
	@alert_errors()
	@alert_success()
	{{ Form::model($setting_order, ['route' => 'setting_order.update', 'method' => 'put']) }}
	<div class="form-group">
		{{ Form::label('order_start', 'Número inicial dos pedidos') }}
		{{ Form::number('order_start', null, ['class' => 'form-control']) }}
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group row">
				{{ Form::label('buyer', 'Comprador', ['class' => 'col-sm-4 col-form-label']) }}
				<div class="col-sm-8">
					<label class="switch switch-primary switch-lg mb-0 ml-3">
						{{ Form::hidden('buyer', 0) }}
						{{ Form::checkbox('buyer', 1, null,['class' => 'switch-input']) }}
						<span class="switch-slider"></span>
					</label>
				</div>
			</div>	
		</div>
	</div>
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
	{{ Form::close() }}
</div>