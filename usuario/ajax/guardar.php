<?php
if (empty($_POST['user'])) {
	$errors[] = "Ingresa el usuario.";
} elseif (!empty($_POST['user'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

	// escaping, additionally removing everything that could be (html/javascript-) code
	$user_u = mysqli_real_escape_string($con, (strip_tags($_POST["user"], ENT_QUOTES)));
	$user_nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
	$user_cat = intval($_POST["category"]);
	$user_pass = mysqli_real_escape_string($con, (strip_tags($_POST["clave"], ENT_QUOTES)));



	// REGISTER data into database
	$sql = "INSERT INTO usuarios(tipoUsuario, nombre, clave, usuario) VALUES ('$user_cat','$user_nombre','$user_pass','$user_u')";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "El usuario ha sido guardado con éxito.";
	} else {
		$errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
	}
} else {
	$errors[] = "desconocido.";
}
if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-info" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>