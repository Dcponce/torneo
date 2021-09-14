<div id="editArbitrotModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_arbitro" id="edit_arbitro">
				<div class="modal-header">
					<h4 class="modal-title">Editar Arbitro</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="edit_id" id="edit_id">
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Teléfono</label>
						<input type="text" name="edit_telefono" id="edit_telefono" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Guardar datos">
				</div>
			</form>
		</div>
	</div>
</div>