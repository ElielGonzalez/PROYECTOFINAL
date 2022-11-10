<?php
function regresarConexion(){

	$server ="localhost";
	$usuario = "root";
	$clave= "";
	$base= "nutricion";
	$conexion=mysqli_connect($server,$usuario,$clave,$base) or die("problemas con la conexion");
	mysqli_set_charset($conexion,'utf8');
	 return $conexion;
}


?>