<?php
require_once("../../conexion.php");
/* Connect To Database*/
$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables = "arbitro";
	$campos = "*";
	$sWhere="nombre LIKE '%".$query."%' or tel LIKE '%".$query."%'";
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
	$query = mysqli_query($con, "SELECT $campos FROM $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	mysqli_close($con);
	if ($numrows > 0) {

?>
		<div class="table-responsive">
			<table class="table table-wrapper table-hover">
				<thead>
					<tr>
						<th class='text-center'>Id</th>
						<th>Nombre</th>
						<th>Teléfono</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$finales = 0;
					$text_class = "";
					while ($row = mysqli_fetch_array($query)) {
						$arbitro_id = $row['id'];
						$arbitro_nombre = $row['nombre'];
						$arbitro_tel = $row['tel'];

						$finales++;
					?>
						<tr class="<?php echo $text_class; ?>">
							<td class='text-center'><?php echo $arbitro_id; ?></td>
							<td><?php echo $arbitro_nombre; ?></td>
							<td><?php echo $arbitro_tel; ?></td>
							<td>
								<a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editArbitrotModal" data-nombre='<?php echo $arbitro_nombre; ?>' data-tel='<?php echo $arbitro_tel; ?>' data-id="<?php echo $arbitro_id; ?>">
									<i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
								<a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteArbitroModal" data-id="<?php echo $arbitro_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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

	}
}
?>