<div class="col-md-{{ $widget->columns }}">
	<div class="card text-white bg-warning">
		<div class="card-body pb-0">
			<div class="btn-group float-right">
				<button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="icon-settings"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item active" href="#">Hoje</a>
					<a class="dropdown-item" href="#">Total</a>
				</div>
			</div>
			<div class="text-value">R$ 823,54</div>
			<div>Ticket Médio</div>
		</div>
		<div class="chart-wrapper mt-3" style="height:70px;">
			<canvas class="chart" id="card-chart3" height="70"></canvas>
		</div>
	</div>
</div>