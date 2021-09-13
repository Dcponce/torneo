<?php
require_once("../../conexion.php");
/* Connect To Database*/
$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables = "usuarios u";
	$campos = "u.id, u.nombre, u.usuario, u.tipoUsuario, t.tipo";
	$sWhere = "nombre LIKE '%" . $query . "%'";
	$sWhere .= " order by id";


	include '../../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}
	$total_pages = ceil($numrows / $per_page);
	//main query to fetch the data
	$query = mysqli_query($con, "SELECT $campos FROM $tables INNER JOIN tipo_usuarios t on u.tipoUsuario = t.id where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if ($numrows > 0) {

?>
		<div class="table-responsive">
			<table class="table table-wrapper table-hover">
				<thead>
					<tr>
						<th class='text-center'>Id</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th class='text-center'>Categoría</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$finales = 0;
					while ($row = mysqli_fetch_array($query)) {
						$user_id = $row['id'];
						$user_nombre = $row['nombre'];
						$user_u = $row['usuario'];
						$user_cat = $row['tipo'];
						$user_tipo = $row['tipoUsuario'];
						$finales++;
					?>
						<tr class="<?php echo $text_class; ?>">
							<td class='text-center'><?php echo $user_id; ?></td>
							<td><?php echo $user_nombre; ?></td>
							<td><?php echo $user_u; ?></td>
							<td class='text-center'><?php echo $user_cat; ?></td>
							<td>
								<a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editUsuariotModal" data-nombre='<?php echo $user_nombre; ?>' data-tipo="<?php echo $user_tipo; ?>" data-user='<?php echo $user_u ?>' data-id="<?php echo $user_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
								<a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteUsuarioModal" data-id="<?php echo $user_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
								<a href="#" class="modefy" data-bs-toggle="modal" data-bs-target="#editPassModal" data-code="<?php echo $user_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Contraseña">keyboard</i></a>
							</td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan='6'>
							<?php
							$inicios = $offset + 1;
							$finales += $inicios - 1;
							echo "Mostrando $inicios al $finales de $numrows registros";
							echo paginate($page, $total_pages, $adjacents);
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
<?php
		mysqli_close($con);
	}
}
?>