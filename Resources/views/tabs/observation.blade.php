{{ Form::open(['route' => ['orders.update', $order], 'method' => 'put']) }}
<div class="form-group">
	{{ Form::textarea('observation', $order->observation, ['class' => 'form-control', 'placeholder' => 'Obervações do pedido']) }}
</div>
{{ Form::button('<i class="fa fa-save"></i><span>Salvar Observação</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
{{ Form::close() }}
