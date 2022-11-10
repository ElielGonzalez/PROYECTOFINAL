<?php
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("../conexion/connect_db.php");
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];
$matricula            = ucwords($_REQUEST['matricula']);


$InsertNuevoEvento = "INSERT INTO calendario(
      evento,
      hora_inicio,
      hora_fin,
      color,
      matricula_Profe
      )
    VALUES (
      '" .$evento. "',
      '" .$color_evento. "',
      '" .$fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$matricula. "'

  )";
$resultadoNuevoEvento = mysqli_query($mysqli, $InsertNuevoEvento);

header("Location:../vista/indexDocente.php?e=1");

?>