<div class="col-md-{{ $widget->columns }}">
	<div class="card">
		<div class="card-header">Market Share por categoria de produtos 
			<div class="card-header-actions">
			</div>
		</div>
		<div class="card-body">
			<div class="chart-wrapper">
				<canvas id="canvas-3"></canvas>
			</div>
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


	var doughnutChart = new Chart($('#canvas-3'), {
		type: 'doughnut',
		data: {
			labels: {!! json_encode($labels) !!},
			datasets: [{
				data: {!! json_encode($values) !!},
				backgroundColor: {!! json_encode($colors) !!},
				hoverBackgroundColor: {!! json_encode($colors) !!}
			}]
		},
		options: {
			responsive: true,
		}
	}); 

</script>
@endpush