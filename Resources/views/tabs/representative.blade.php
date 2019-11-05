<h5>Dados</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Nome: </strong></div>
	<div class="col-md-5">{{ 'João da Silva' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Email: </strong></div>
	<div class="col-md-5">{{ 'joao@gmail.com' }}</div>
</div>
<div class="row justify-content-center mb-3">
	<div class="col-md-5"><strong>Telefone: </strong></div>
	<div class="col-md-5">{{ '(31)33333333' }}</div>
</div>
<hr>
{{Form::open(['route' => ['orders.update.representative', '1'], 'method' => 'put']) }}
{{ Form::button('<i class="fa fa-refresh"></i><span>Trocar de Representante</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
{{ Form::close() }}