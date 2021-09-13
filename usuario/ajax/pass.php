<?php
if (empty($_POST['idpass'])) {
	$errors[] = "Id vacío.";
} elseif (!empty($_POST['idpass'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

	// escaping, additionally removing everything that could be (html/javascript-) code
	$id = intval($_POST['idpass']);

	$pass = "prodesarrollo";
	$cifrado = password_hash($pass, PASSWORD_DEFAULT);

	// UPDATE data into database
	$sql = "UPDATE usuarios SET clave='$cifrado' WHERE id='$id'";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "La contraseña ha sido restablecida con éxito.";
	} else {
		$errors[] = "Lo sentimos, el restablecimiento falló. Por favor, regrese y vuelva a intentarlo.";
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
	<div class="alert alert-success" role="alert">
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