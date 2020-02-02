<div class="modal fade" id="modal_clean_orders" tabindex="-1" role="dialog" aria-labelledby="modal_clean_orders" aria-hidden="true">
	<div class="modal-dialog modal-smd" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>A seguinte ação irá excluir todos os pedidos que estão vazios (sem items).</p>
				{{ Form::open(['route' => ['orders.destroy.clean'], 'method' => 'delete']) }}
				{{ Form::submit('Sim', ['class' => 'btn btn-danger']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>	