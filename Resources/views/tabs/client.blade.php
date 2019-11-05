<h5>Dados</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Nome Fantasia: </strong></div>
	<div class="col-md-5">{{ 'MINAS COMPUTADORES' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Razão Social: </strong></div>
	<div class="col-md-5">{{ 'PC ACOES LTDA.' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>CPF/CNPJ: </strong></div>
	<div class="col-md-5">{{ '0799559660034' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Nome Comprador: </strong></div>
	<div class="col-md-5">{{ 'Leonardo Vasconcelos' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Email: </strong></div>
	<div class="col-md-5">{{ 'leonardovasconcelos@gmail.com' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Telefone: </strong></div>
	<div class="col-md-5">{{ '(31) 33334444' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Transportadora: </strong></div>
	<div class="col-md-5">{{ 'NEPUNOCEMO' }}</div>
</div>
<hr>
<h5>Endereço</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Rua: </strong></div>
	<div class="col-md-5">{{ 'Salamao' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Número: </strong></div>
	<div class="col-md-5">{{ '345' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Complemento: </strong></div>
	<div class="col-md-5">{{ '301' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Bairro: </strong></div>
	<div class="col-md-5">{{ 'Cascalho' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Cidade: </strong></div>
	<div class="col-md-5">{{ 'Rio Grande do Norte' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>UF: </strong></div>
	<div class="col-md-5">{{ 'MN' }}</div>
</div>
<div class="row justify-content-center mb-3">
	<div class="col-md-5"><strong>CEP: </strong></div>
	<div class="col-md-5">{{ '30112098' }}</div>
</div>
<hr>
{{Form::open(['route' => ['orders.update.client', '1'], 'method' => 'put']) }}
{{ Form::button('<i class="fa fa-refresh"></i><span>Trocar de Cliente</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
{{ Form::close() }}