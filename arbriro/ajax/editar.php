<?php
if (empty($_POST['edit_id'])) {
    $errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])) {
    require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
    $con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

    // escaping, additionally removing everything that could be (html/javascript-) code
	$arbitro_nombre = mysqli_real_escape_string($con, (strip_tags($_POST["edit_nombre"], ENT_QUOTES)));
	$arbitro_tel = mysqli_real_escape_string($con, (strip_tags($_POST["edit_telefono"], ENT_QUOTES)));


    $id = intval($_POST['edit_id']);
    // UPDATE data into database
    $sql = "UPDATE arbitro SET nombre='" . $arbitro_nombre . "', tel='" . $arbitro_tel . "' WHERE id='" . $id . "' ";
    $query = mysqli_query($con, $sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El arbitro ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
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