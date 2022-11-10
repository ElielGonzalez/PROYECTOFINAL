<?php
require("../conexion/connect_db.php");
$cod=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM dieta WHERE id_dieta = '$cod'");

    if($mysqli){
    Header("Location: ../vista/registrarDieta.php");
    }else {    
    
    }
?>