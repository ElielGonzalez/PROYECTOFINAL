<?php
require("../conexion/connect_db.php");
$cod=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM historiaclinica WHERE id_historiaClinica= '$cod'");

    if($mysqli){
    Header("Location: ../vista/listaHistoriales.php");
    }else {    
    
    }
?>