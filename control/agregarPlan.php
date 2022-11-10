<?php
include("../conexion/connect_db.php");

$nomPro = $_REQUEST['alumno_matricula'];
$grupo = $_REQUEST['grupo'];
$alimento = $_REQUEST['alimento'];

    mysqli_query($mysqli,"INSERT INTO plannutricional(tipoComida,alumno_matricula,gestionAlimentos_idGesAlimento) VALUES ('$grupo','$nomPro','$alimento')");

    if($mysqli){
    Header("Location: ../vista/indexDocente.php");
    }else{    
    }


?>