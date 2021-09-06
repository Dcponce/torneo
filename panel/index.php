<?php

session_start();
if (isset($_SESSION["user"]["tipo"]) == 0) {
	header("Location:../index.html")
?>

	<!DOCTYPE>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Torneo de F&uacute;tbol</title>
		<link href="../css/estilo.css" rel="stylesheet" type="text/css">
		</link>
	</head>

	<body>

	<?php
} else {

	?>
		<?php
		print "<div id='header'><nav>
	<b>
  <ul>		                    
<li><a href='equipos.php'>Equipos</a></li>		                    
<li><a href='jugadores.php'>Jugadores</a></li>
<li><a href='partidos.php'>Partidos</a></li>
<li><a href='resultados.php'>Resultados</a></li>
<li><a href='posiciones.php'>Posiciones</a></li>
<!-- <li><a href='reglamento.php'>Reglamento</a></li> -->
<!-- <li><a href='descargar.php'>Descargar</a></li> -->
</ul>
</b>
</nav></div>"; ?>
		<div id="section"></div>
		<div id="footer"></div>

	</body>

	</html>
<?php } ?>