<div class="col-md-{{ $widget->columns }}">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-5">
					<h4 class="card-title mb-0">Vendas</h4>
				</div>
				<!-- /.col-->
				<div class="col-sm-7 d-none d-md-block">
					<div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
						<label class="btn btn-outline-secondary active">
							<input id="option1" type="radio" name="options" autocomplete="off"> Hora
						</label>
						<label class="btn btn-outline-secondary">
							<input id="option2" type="radio" name="options" autocomplete="off" checked=""> Dia
						</label>
					</div>
				</div>
				<!-- /.col-->
			</div>
			<!-- /.row-->
			<div class="chart-wrapper" style="height:300px;margin-top:40px;">
				<canvas class="chart" id="main-chart" height="300"></canvas>
			</div>
		</div>
		<div class="card-footer">
			<div class="row text-center">
				<div class="col-sm-12 col-md mb-sm-2 mb-0">
					<div class="text-muted">20/02/2020</div>
					<strong>R$ 8.030,43</strong>
					<div class="progress progress-xs mt-2">
						<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md mb-sm-2 mb-0">
					<div class="text-muted">21/02/2020</div>
					<strong>R$ 7.330,43</strong>
					<div class="progress progress-xs mt-2">
						<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md mb-sm-2 mb-0">
					<div class="text-muted">22/02/2020</div>
					<strong>R$ 8.030,43</strong>
					<div class="progress progress-xs mt-2">
						<div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<div class="col-sm-12 col-md mb-sm-2 mb-0">
					<div class="text-muted">23/02/2020</div>
					<strong>R$ 5.230,43</strong>
					<div class="progress progress-xs mt-2">
						<div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>