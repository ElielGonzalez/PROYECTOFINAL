<?php
require '../conexion/conexion.php';
//convierte el json a array
$productos=json_decode($_POST['json'],true);
//recorrer el arreglo
foreach ($productos as $producto){
     $nombre=$producto['nombre'];
      $nombreAlimento=$producto['nombreAlimento'];
      $grupo=$producto['grupo'];
      $kcal=$producto['kcal'];
      $grasa=$producto['grasa'];
      $hCarbono=$producto['hCarbono'];
      $proteina=$producto['proteina'];    
     $guardar=mysqli_query($con,"INSERT INTO gestionalimentos (
          porcion,
          nombreAlimento,
          grupo,
          kcal,
          grasa,
          hCarbono,
          proteina) VALUES (
          '$nombre',
          '$nombreAlimento',
          '$grupo',
          '$kcal',
          '$grasa',
          '$hCarbono',
          '$proteina')");
}

if($con){
    Header("Location: ../vista/indexDocente.php");
    }else{    
    }
?>