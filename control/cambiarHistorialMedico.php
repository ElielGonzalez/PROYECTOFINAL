<?php
include("../conexion/connect_db.php");

$alumno_matricula = $_POST['alumno_matricula'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];
$p8 = $_POST['p8'];


    mysqli_query($mysqli,"UPDATE historiaclinica SET
     p1 = '$p1', 
     p2 = '$p2', 
     p3 = '$p3',
     p4 = '$p4',
     p5 = '$p5',
     p6 = '$p6',
     p7 = '$p7',
     p8 = '$p8' WHERE alumno_matricula ='$alumno_matricula'");

    if($mysqli){
    Header("Location: ../vista/listaHistoriales.php");
    }else{    
    }


?>