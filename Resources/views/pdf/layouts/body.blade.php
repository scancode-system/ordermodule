<table class="w-100 mb-3">
	@include('order::pdf.tables.thead')
	<tbody>
		@each('order::pdf.tables.tr', $order->items, 'item')
	</tbody>
</table>