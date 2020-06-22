<div class="col-md-{{ $widget->columns }}">
	<div class="card">
		<h5 class="card-header">Produtos Vendidos</h5>
		<div class="card-body">

			<table class="table table-striped table-bordered table-hover datatable datatable">
				<thead class="">
					<tr>
						<th>Img.</th>
						<th>Produto</th>
						<th class="text-center">Preço</th>
						<th class="text-center">Desc</th>
						<th class="text-center">Acresc</th>
						<th class="text-center">Quantidade</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td>
							<img src="{{ url($product->image) }}" alt="..." class="img-thumbnail" style="height: 75px;">
						</td>
						<td class="align-middle">{{ $product->description }}</td>
						<td class="align-middle text-center">@currency($product->price)</td>
						<td class="align-middle text-center">@currency($product->discount_value)</td>
						<td class="align-middle text-center">@currency($product->addition_value)</td>
						<td class="align-middle text-center" data-sort="{{ $product->qty }}">{{ $product->qty }} Unidades</td>
						<td class="align-middle text-center" data-sort="{{ $product->total }}">@currency($product->total)</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>


@push('scripts')
{{ Html::script('modules/dashboard/coreui/node_modules/datatables.net/js/jquery.dataTables.js') }}
{{ Html::script('modules/dashboard/coreui/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js') }}

<script>

	$('.datatable').DataTable({
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
  });
	$('.datatable').attr('style', 'border-collapse: collapse !important');


</script>
@endpush