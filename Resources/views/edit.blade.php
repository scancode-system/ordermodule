@extends('dashboard::layouts.master')

@section('content')
<div class="card">
	
	<div class="card-header border-bottom-0 d-flex align-items-center py-2 px-4 ">
		<h5 class="mb-0 mr-4">Pedido #{{ $order->id }}</h5>
		<div>
			{{ Form::Open(['route' => ['orders.update.status', $order], 'method' => 'put']) }}
			{{ Form::select('status_id', $select_statuses, $order->status_id ,['class' => 'form-control', 'id' => 'status_id']) }}
			{{ Form::close() }}
		</div>
			<span class=" ml-auto"></span>
			@loader(['loader_path' => 'order.edit_actions'])
			<a href="{{ route('orders.pdf', $order) }}" target="_blank" class="btn btn-outline-danger mr-3"><i class="fa fa-file-pdf-o"></i> PDF</a>
			{{ Form::open(['route' => ['orders.clone', $order]]) }}
			{{ Form::button('<i class="fa fa-share-alt"></i> Clonar Pedido', ['class' => 'btn btn-outline-success', 'type' => 'submit']) }}
			{{ Form::close() }}
	</div>
	<div class="card-header">
		<nav>
			<div class="nav nav-tabs" role="tablist">
				<style>.leo:hover{border-top: 1px solid #c8ced3!important;}</style>
				<a class="nav-item nav-link leo {{ ($tab==0)?'active border-top':'' }}" href="{{ route('orders.edit', [$order->id, 0]) }}">Itens</a>
				<a class="nav-item nav-link leo {{ ($tab==1)?'active border-top':'' }}" href="{{ route('orders.edit', [$order->id, 1]) }}">Cliente</a>
				<a class="nav-item nav-link leo {{ ($tab==2)?'active border-top':'' }}" href="{{ route('orders.edit', [$order->id, 2]) }}">Representante</a>
				<a class="nav-item nav-link leo {{ ($tab==3)?'active border-top':'' }}" href="{{ route('orders.edit', [$order->id, 3]) }}">Pagamento</a>
				<a class="nav-item nav-link leo {{ ($tab==4)?'active border-top':'' }}" href="{{ route('orders.edit', [$order->id, 4]) }}">Observação</a>
			</div>
		</nav>
	</div>
	<div class="card-body">
		@alert_errors()
		@alert_success()
		<div class="tab-content border-0">
			<div class="tab-pane p-0 {{ ($tab==0)?'show active':'' }}" >
				@include('order::tabs.items')
			</div>
			<div class="tab-pane p-0 {{ ($tab==1)?'show active':'' }}">
				@include('order::tabs.client')
			</div>
			<div class="tab-pane p-0 {{ ($tab==2)?'show active':'' }}">
				@include('order::tabs.saller')
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


@push('scripts')
<script>
	$('#status_id').change(function() {
			this.form.submit();
		});
</script>
@endpush