<?php
header('Content-Type:application/json');
$pdo= new PDO("mysql:dbname=nutricion;host=localhost","root","");

$accion =(isset($_GET['accion']))?$_GET['accion']:'leer';
 	switch ($accion) {
 		case 'agregar':
 			// code...
 		$sentenciaSQL = $pdo->prepare("INSERT INTO eventos (title, descripcion, color, textColor, start, end) VALUES (:title, :descripcion, :color, :textColor, :start,:end)");

 		$respuesta=$sentenciaSQL->execute(array(
 			"title"=>$_POST['title'],
 			"descripcion"=>$_POST['descripcion'],
 			"color"=>$_POST['color'],
 			"textColor"=>$_POST['textColor'],
 			"start"=>$_POST['start'],
 			"end"=>$_POST['end']

 		));

 		echo json_encode($respuesta);

 			break;
 		case 'eliminar':
 			// code...
 		//echo "eliminar";
 		$respuesta= false;
 		if (isset($_POST['id'])) {
 			// code...
 			$sentenciaSQL= $pdo->prepare("DELETE FROM eventos WHERE eventos.id = :ID");
 			$respuesta = $sentenciaSQL-> execute(array("ID"=>$_POST['id']));
 		}
 		echo json_encode($respuesta);
 			break;
 		case 'modificar':
 			// code...
 		$sentenciaSQL =$pdo->prepare("UPDATE eventos SET
 		 title = :title,
 		 descripcion = :descripcion,
 		 color = color,
 		 textColor = :textColor,
 		 start = :start,
 		 end = :end WHERE id = :ID
 		 ");

 		$respuesta=$sentenciaSQL->execute(array(
 			//"ID"=>$_POST['id'],
 			"title"=>$_POST['title'],
 			"descripcion"=>$_POST['descripcion'],
 			"color"=>$_POST['color'],
 			"textColor"=>$_POST['textColor'],
 			"start"=>$_POST['start'],
 			"end"=>$_POST['end']

 		));

 		echo json_encode($respuesta);
 			break;
 		
 		case 'listar':
 		 	$sentenciaSQL = $pdo->prepare("select * from eventos");
			$sentenciaSQL ->execute();
			$resultado =$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($resultado);
 			break;

 		default:
 			echo "datos insertdados";
 			break;
 	}

//senetecias sql




?>