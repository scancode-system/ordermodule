<div class="col-md-{{ $widget->columns }}">
	<div class="card text-white bg-primary">
		<div class="card-body pb-0">
			<div class="btn-group float-right">
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item active" href="#">Hoje</a>
					<a class="dropdown-item" href="#">Total</a>
				</div>
			</div>
			<div class="text-value">@currency($total)</div>
			<div>Vendas do dia</div>
		</div>
		<div class="chart-wrapper mt-3 mx-3" style="height:70px;">
			<canvas class="chart" id="mini_chart_sale_{{ $widget->id }}" height="70"></canvas>
		</div>
	</div>
</div>

@push('scripts')
{{ Html::script('modules/dashboard/coreui/node_modules/chart.js/dist/Chart.min.js') }}
{{ Html::script('modules/dashboard/coreui/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js') }}

<script>

	Chart.defaults.global.pointHitDetectionRadius = 1;
	Chart.defaults.global.tooltips.enabled = false;
	Chart.defaults.global.tooltips.mode = 'index';
	Chart.defaults.global.tooltips.position = 'nearest';
	Chart.defaults.global.tooltips.custom = CustomTooltips;
	Chart.defaults.global.tooltips.intersect = false;




	var mini_chart_sale_{{ $widget->id }} = new Chart($('#mini_chart_sale_{{ $widget->id }}'), {
		type: 'line',
		data: {
			labels: {!! json_encode($hours) !!},
			datasets: [{
				label: 'Total Vendas Hora',
				backgroundColor: getStyle('--primary'),
				borderColor: 'rgba(255,255,255,.55)',
				data: {!! json_encode($sales) !!},
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
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
						min: 0,
						//max: 10000
					}
				}]
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
</script>
@endpush