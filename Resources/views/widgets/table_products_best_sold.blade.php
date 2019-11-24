<div class="col-md-{{ $widget->columns }}">
	<table class="table table-responsive-sm bg-white table-hover border">
		<thead class="thead-dark">
			<tr>
				<th colspan="7" class="border-bottom-0">Produtos Mais Vendidos</th>
			</tr>
			<tr>
				<th class="border-top-0">Img.</th>
				<th class="border-top-0">Produto</th>
				<th class="text-center border-top-0">Preço</th>
				<th class="text-center border-top-0">Desc</th>
				<th class="text-center border-top-0">Acresc</th>
				<th class="text-center border-top-0">Quantidade</th>
				<th class="text-center border-top-0">Total</th>
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
				<td class="align-middle text-center">{{ $product->qty }} Unidades</td>
				<td class="align-middle text-center">@currency($product->total)</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>