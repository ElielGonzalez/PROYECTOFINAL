<?php
require '../conexion/conexion.php';
//convierte el json a array
$productos=json_decode($_POST['json'],true);
//recorrer el arreglo
foreach ($productos as $producto){
     $nombre=$producto['nombre'];
      $nombreAlimento=$producto['nombreAlimento'];
      $grupo=$producto['grupo'];  
     $guardar=mysqli_query($con,"INSERT INTO plannutricional(
          tipoComida,
          alumno_matricula ,
          gestionAlimentos_idGesAlimento ) VALUES (
          '$nombre',
          '$nombreAlimento',
          '$grupo')");
}

if($con){
    Header("Location: ../vista/indexDocente.php");
    }else{    
    }
?>