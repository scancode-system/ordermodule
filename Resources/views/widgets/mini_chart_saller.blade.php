<div class="col-md-{{ $widget->columns }}">
	<div class="card text-white bg-danger">
		<div class="card-body pb-0">
			<div class="btn-group float-right">
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item active" href="#">Hoje</a>
					<a class="dropdown-item" href="#">Total</a>
				</div>
			</div>
			<div class="text-value">{{ $best }}</div>
			<div>Rpresentante do dia</div>
		</div>
		<div class="chart-wrapper mt-3 mx-3" style="height:70px;">
			<canvas class="chart" id="card-chart4" height="70"></canvas>
		</div>
	</div>
</div>


@push('scripts')
{{ Html::script('modules/dashboard/coreui/node_modules/chart.js/dist/Chart.min.js') }}
{{ Html::script('modules/dashboard/coreui/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js') }}

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

	Chart.defaults.global.pointHitDetectionRadius = 1;
	Chart.defaults.global.tooltips.enabled = false;
	Chart.defaults.global.tooltips.mode = 'index';
	Chart.defaults.global.tooltips.position = 'nearest';
	Chart.defaults.global.tooltips.custom = CustomTooltips;
	Chart.defaults.global.tooltips.intersect = false;



	var cardChart4 = new Chart($('#card-chart4'), {
		type: 'bar',
		data: {
			labels: {!! json_encode($names) !!},
			datasets: [{
				label: '',
				backgroundColor: 'rgba(255,255,255,.2)',
				borderColor: 'rgba(255,255,255,.55)',
				data: {!! json_encode($sales) !!}
			}]
		},
		options: {
			tooltips: {
				callbacks: {
					label: function(tooltipItem, data) {
						var label = data.datasets[tooltipItem.datasetIndex].label || '';

						if (label) {
							label += ': ';
						}
						label += 'R$ '+tooltipItem.yLabel.toLocaleString('pt-BR');
						return label;
					}
				}
			},
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			scales: {
				xAxes: [{
					display: false,
					barPercentage: 0.6
				}],
				yAxes: [{
					display: false
				}]
			}
		}
	});


</script>
@endpush