{{ Form::open(['route' => ['orders.update', 1], 'method' => 'put']) }}
<div class="form-group">
	{{ Form::textarea('observation', null, ['class' => 'form-control', 'placeholder' => 'Obervações do pedido']) }}
</div>
<hr>
{{Form::open(['route' => ['orders.update', '1'], 'method' => 'put']) }}
{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
{{ Form::close() }}
