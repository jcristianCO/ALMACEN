<div class="modal fade" id="modalshow{{$row->id}}">
	<form action="{{ route('entradas.show', $row->id) }}" method="GET">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden>x</span>
					</button>
					<h4 class="modal-title">Eliminar Proveedor</h4>
				</div>
				<div class="modal-body">
					<p>
						Confirme si desea Eliminar <strong>{{ $row->descripcion }}</strong>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cerrar
					</button>
					<button type="submit" class="btn btn-primary">Cofirmar</button>
				</div>
			</div>
		</div>
	</form>
</div>