<div class="tab-pane {{ ($tab=='order_setting_info')?'show active':'' }}" >
	@alert_errors()
	@alert_success()
	{{ Form::model($setting_order, ['route' => 'setting_order.update', 'method' => 'put']) }}
	<div class="form-group">
		{{ Form::label('order_start', 'Número inicial dos pedidos') }}
		{{ Form::number('order_start', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('global_observation', 'Observação') }}
		{{ Form::textarea('global_observation', null, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
	<div class="form-group">
		{{ Form::label('statement_responsibility', 'Termo') }}
		{{ Form::textarea('statement_responsibility', null, ['class' => 'form-control', 'placeholder' => '']) }}
	</div>
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
	{{ Form::close() }}
</div>