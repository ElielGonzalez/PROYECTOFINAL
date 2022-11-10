<?php
include("../conexion/connect_db.php");

$alumno_matricula = $_POST['alumno_matricula'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];


    mysqli_query($mysqli,"INSERT INTO habitosalimenticios (id_habitosAlimentcios, alumno_matricula, p1, p2, p3, p4, p5, p6) VALUES (NULL, '$alumno_matricula', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6')");

    if($mysqli){
    Header("Location: ../vista/listaHabitosAlimenticios.php");
    }else{    
    }


?>