@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	@include('order::subviews.index_header',['search' => 'Pesquisar', 'route_search' => 'orders.index', 'route_add' => 'orders.create'])
	<div class="card-body">
		@alert_errors()
		<table class="table table-responsive-sm bg-white table-hover border">
			@include('order::tables.index.header')
			<tbody>
				@each('order::tables.index.row', $orders, 'order')
			</tbody>
		</table>
		{{ $orders->links() }}
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Pedidos
</li>
@endsection
