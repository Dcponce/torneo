<div id="addUsuarioModal" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_Usuario" id="add_Usuario">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Usuario</h4>
						<button type="button"class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre"  id="nombre" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Clave</label>
							<input type="password" name="clave" id="clave" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Categoría</label>
							<select name="category" id="category" class="form-select" required>
								<option value="" disabled selected>Seleccionar...</option>
							</select>
						</div>
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" name="user" id="user" class="form-control" required>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>