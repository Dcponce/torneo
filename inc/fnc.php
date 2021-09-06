<?php


include("../inc/config.php");

if (isset($_REQUEST["btnEnviar"])) {
	$usu = $_POST["usuario"];
	$pass = $_POST["clave"];

	try {
		$con = new mysqli(HOST, USERDB, PASSDB, DB);
		$sqlc = "SELECT tipo FROM usuarios WHERE usuario='$usu' AND clave='$pass'";
		$re = $con->query($sqlc);
		$can = mysqli_num_rows($re);
		$tipo = 0;

		if ($can == 1) {
			$fila = $re->fetch_array(MYSQLI_NUM);
			//$res->fetch_assoc();
			$tipo = $fila[0];


			session_start();
			$_SESSION["user"]["tipo"] = $tipo;
			header("Location:../panel/index.php");
			$con->close();
		}
	} catch (\Throwable $th) {
		header("Location:login.php?error");
	}
}



function publicar($id, $texto)
{

	/*
   2: Equipos		                    
   3: Jugadores		                    
   4: Fixture
   5: Resultados
   6: Posiciones
   7: Goleadores
   8: Reglamento
*/
	$f = "../content/" . $id;
	$fp = fopen($f, "w");
	fwrite($fp, $texto . PHP_EOL);
	fclose($fp);
	return (file_exists($f) && filesize($f) > 0);
}
function footer()
{
	print "<div class='espacio'></div><div id='footer'></div>";
}
function menuHeader()
{
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
		   </nav></div>";
}
