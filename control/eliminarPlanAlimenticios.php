<?php
require("../conexion/connect_db.php");
$cod=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM plannutricional WHERE id_planAlimenticio = '$cod'");

    if($mysqli){
        //echo "<script>location.href='../vista/registrarPlanNutricional.php;</script>";
    Header("Location: ../vista/registrarPlanNutricional.php");
    }else {    
    
    }
?>