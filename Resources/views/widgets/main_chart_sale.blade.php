<div class="col-md-{{ $widget->columns }}">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-5">
					<h4 class="card-title mb-0">Vendas</h4>
				</div> 
			</div>
			<!-- /.row-->
			<div class="chart-wrapper" style="height:300px;margin-top:40px;">
				<canvas class="chart" id="main_chart_{{ $widget->id }}" height="300"></canvas>
			</div>
		</div>
		<div class="card-footer">
			<div class="row text-center">
				@foreach($days as $date => $day)
				<div class="col-sm-12 col-md mb-sm-2 mb-0">
					<div class="text-muted">{{ $date }}</div> 
					<strong>@currency($day['total'])</strong>
					<div class="progress progress-xs mt-2">
						<div class="progress-bar bg-{{ $day['color'] }}" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				@endforeach
			</div>
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


	Chart.defaults.global.tooltips.callbacks.labelColor = function (tooltipItem, chart) {
		return {
			backgroundColor: chart.data.datasets[tooltipItem.datasetIndex].borderColor
		};
	}; 

	var main_chart_{{ $widget->id }} = new Chart($('#main_chart_{{ $widget->id }}'), {
		type: 'line',
		data: {
			labels: {!! json_encode($hours) !!},
			datasets: [
			@foreach($days as $date => $day)
			{
				label: '{{ $date }}',
				backgroundColor: 'transparent',
				borderColor: getStyle('--{{ $day['color'] }}'),
				pointHoverBackgroundColor: '#fff',
				borderWidth: 2,
				data: {!! json_encode(array_values($day['dataset'])) !!}
			},
			@endforeach
			]
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
					},
					title: function(tooltipItem, data) {
						console.log(tooltipItem);
						console.log(data);
						return 'Horário - '+tooltipItem[0].xLabel;
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
						drawOnChartArea: false
					}
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						maxTicksLimit: 5,
						stepSize: Math.ceil(250 / 5),

					}
				}]
			},
			elements: {
				line: {
					tension: 0.00001,
				},
				point: {
					radius: 0,
					hitRadius: 10,
					hoverRadius: 4,
					hoverBorderWidth: 3
				}
			}
		}
	});


</script>
@endpush