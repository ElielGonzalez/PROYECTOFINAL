<?php
include("../conexion/connect_db.php");

$nomPro = $_REQUEST['dia'];
$grupo = $_REQUEST['idPrueba2'];

    mysqli_query($mysqli,"INSERT INTO dieta (dia,id_planAlimenticio) VALUES ('$nomPro','$grupo')");

    if($mysqli){
    Header("Location: ../vista/registrarPlanNutricional.php");
    }else{    
    }


?>