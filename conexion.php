<?php
/*-------------------------
	Autor: David Cordova
	Mail: consultas@aplicacionesinfinitas.com
	---------------------------*/
// DB credentials.
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('CONTRA', '');
define('BD', 'prodesarrollo');

# conectare la base de datos
$con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD);

/* comprobar la conexión */
/* if (mysqli_connect_errno()) {
	printf("Conexión fallida: %s\n", mysqli_connect_error());
	exit();
}
 */
/* comprobar si el servidor sigue funcionando */
/* if (mysqli_ping($con)) {
	printf("¡La conexión está bien!\n");
} else {
	printf("Error: %s\n", mysqli_error($con));
} */

/* cerrar la conexión */
mysqli_close($con);
?>