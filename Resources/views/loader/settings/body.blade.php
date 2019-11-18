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
<div class="tab-pane {{ ($tab=='order_setting_pdf')?'show active':'' }}" >
	@alert_errors()
	@alert_success()
	{{ Form::model($setting_order, ['route' => 'setting_order.update', 'method' => 'put']) }}
	<div class="form-group">
		{{ Form::label('pdf_title', 'Título impresso no pedido') }}
		{{ Form::text('pdf_title', null, ['class' => 'form-control']) }}
	</div>
		<div class="form-group">
		{{ Form::label('pdf_margin_top', 'Margem Top') }}
		{{ Form::number('pdf_margin_top', null, ['class' => 'form-control']) }}
	</div>
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
	{{ Form::close() }}
</div>
<div class="tab-pane {{ ($tab=='order_setting_print')?'show active':'' }}" >
	@alert_errors()
	@alert_success()
	{{ Form::model($setting_order, ['route' => 'setting_order.update', 'method' => 'put']) }}
	<div class="form-group">
		{{ Form::label('number_copies', 'Número de vias') }}
		{{ Form::text('number_copies', null, ['class' => 'form-control']) }}
	</div>
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
	{{ Form::close() }}
</div>