<div id="editPassModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_pass" id="edit_pass">
					<div class="modal-header">						
						<h4 class="modal-title">Restablecer contraseña</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que quieres restablecer esta contraseña?</p>
						<p class="text-warning"><small>Esta acción crea una contraseña predeterminada.</small></p>
						<input type="hidden" name="idpass" id="idpass">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Restablecer">
					</div>
				</form>
			</div>
		</div>
	</div>