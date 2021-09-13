<?php
$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);
$sql = "SELECT * FROM tipo_usuarios";
$result = $con->query($sql);
$con->close();

?>

<div id="editUsuariotModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_usuario" id="edit_usuario">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Usuario</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Categoría</label>
						<select name="edit_tipo" id="edit_tipo" class="form-select" required>
							<option value="" disabled selected>Seleccionar...</option>
							<?php
							while ($row = mysqli_fetch_array($result)) {
							?>
								<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<input type="text" name="edit_user" id="edit_user" class="form-control" required>
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