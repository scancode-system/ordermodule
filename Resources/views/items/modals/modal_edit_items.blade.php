<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modal_id }}" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@include('order::items.forms.form', ['item' => $item])
		</div>
	</div>
</div>