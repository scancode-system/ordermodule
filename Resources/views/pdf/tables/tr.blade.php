<tr>
	<td class="border-bottom border-left border-dark p-2">
		<img src="{{ url($item->item_product->image) }}" class="width-75">
	</td>
	<td class="border-bottom border-dark p-2">{{ $item->item_product->sku }}</td>
	<td class="border-bottom border-dark p-2">{{ $item->item_product->description }}</td>
	<td class="border-bottom border-dark text-center p-2">{{ $item->qty }}</td>
	<td class="border-bottom border-dark text-center p-2">@currency($item->price)</td>
	<td class="border-bottom border-dark text-center p-2">@currency($item->discount_value)</td>
	<td class="border-bottom border-dark text-center p-2">@currency($item->addition_value)</td>
	<td class="border-bottom border-right border-dark text-center p-2">@currency($item->total)</td>
</tr>