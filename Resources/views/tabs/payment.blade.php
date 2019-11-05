<h5>Dados</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Descrição: </strong></div>
	<div class="col-md-5">{{ 'CAC055' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Valor Mínimo: </strong></div>
	<div class="col-md-5">@currency(1500)</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Desconto: </strong></div>
	<div class="col-md-5">@percentage('34.54')</div>
</div>
<div class="row justify-content-center mb-3">
	<div class="col-md-5"><strong>Acréscimo: </strong></div>
	<div class="col-md-5">@percentage('34.54')</div>
</div>
<hr>
{{Form::open(['route' => ['orders.update.payment', '1'], 'method' => 'put']) }}
{{ Form::button('<i class="fa fa-refresh"></i><span>Trocar de Pagamento</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
{{ Form::close() }}