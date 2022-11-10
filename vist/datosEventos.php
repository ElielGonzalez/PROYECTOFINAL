<?php
header('Content-Type:application/json');

require("../conexion/con.php");
  

 $conexion = regresarConexion();

  switch ($_GET['accion']) {
  	case 'listar':
  		$datos = mysqli_query($conexion,"SELECT id,
		  	titulo as title,
		  	descripcion,
		  	inicio as start,
		  	fin as end,
		  	colortexto as textColor,
		  	colorfondo as backgroundColor from cita");
  		$resultado = mysqli_fetch_all($datos,MYSQLI_ASSOC);

  		echo json_encode($resultado);

  		break;
  	case 'agregar':
 

 
  		break;
  	case 'modificar':
  	/*
  		"UPDATE eventos SET titulo = '$_POST[titulo]',
  		 descripcion = '$_POST[descripcion]',
  		 inicio = '$_POST[inicio]',
  		 fin = '$_POST[fin]',
  		 colortexto = '$_POST[colortexto]',
  		 colorfondo = '$_POST[colorfondo]'
  		 WHERE id = $_POST[id]"
		*/
  		break;
  	case 'borrar':

  		/*"DELETE FROM eventos WHERE id = $_POST[id]"*/
  		break;
  	
  	default:
  		// code...
  		break;
  }

?>