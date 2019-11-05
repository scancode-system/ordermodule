@extends('dashboard::layouts.master')

@section('content')
<div class="card">
	
	<div class="card-header border-bottom-0 d-flex align-items-center py-2 px-4 ">
		<h5 class="mb-0 mr-4">Pedido #{{ '1' }}</h5>
		<div>
			{{ Form::select('product_category_id', ['Aberto', 'Concluido'], null,['class' => 'form-control']) }}
		</div>
		<div class="btn-group ml-auto" role="group" aria-label="Basic example">
			{{ Form::button('<i class="fa fa-file-pdf-o"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
			{{ Form::button('<i class="fa fa-eye"></i>', ['class' => 'btn  btn-secondary', 'type' => 'submit']) }}
			{{ Form::button('<i class="fa fa-share-alt"></i>', ['class' => 'btn  btn-success', 'type' => 'submit']) }}
			{{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn  btn-danger', 'type' => 'submit']) }}
		</div>

	</div>
	<div class="card-header">
		<nav>
			<div class="nav nav-tabs" role="tablist">
				<style>.leo:hover{border-top: 1px solid #c8ced3!important;}</style>
				<a class="nav-item nav-link leo {{ ($tab==0)?'active border-top':'' }}" href="{{ route('orders.edit', [1, 0]) }}">Itens</a>
				<a class="nav-item nav-link leo {{ ($tab==1)?'active border-top':'' }}" href="{{ route('orders.edit', [1, 1]) }}">Cliente</a>
				<a class="nav-item nav-link leo {{ ($tab==2)?'active border-top':'' }}" href="{{ route('orders.edit', [1, 2]) }}">Representante</a>
				<a class="nav-item nav-link leo {{ ($tab==3)?'active border-top':'' }}" href="{{ route('orders.edit', [1, 3]) }}">Pagamento</a>
				<a class="nav-item nav-link leo {{ ($tab==4)?'active border-top':'' }}" href="{{ route('orders.edit', [1, 4]) }}">Observação</a>
			</div>
		</nav>
	</div>
	<div class="card-body">
		<div class="tab-content border-0">
			<div class="tab-pane p-0 {{ ($tab==0)?'show active':'' }}" >
				@include('order::tabs.items')
			</div>
			<div class="tab-pane p-0 {{ ($tab==1)?'show active':'' }}">
				@include('order::tabs.client')
			</div>
			<div class="tab-pane p-0 {{ ($tab==2)?'show active':'' }}">
				@include('order::tabs.representative')
			</div>
			<div class="tab-pane p-0 {{ ($tab==3)?'show active':'' }}">
				@include('order::tabs.payment')
			</div>
			<div class="tab-pane p-0 {{ ($tab==4)?'show active':'' }}">
				@include('order::tabs.observation')
			</div>
		</div>
	</div>
</div>



@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ route('orders.index') }}">Pedidos</a>
</li>
<li class="breadcrumb-item">
	Pedido
</li>
@endsection
