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
$nombreImg=$_FILES['imagen']['name'];
$archivo=$_FILES['imagen']['tmp_name'];
$ruta="correo";
$ruta=$ruta."/".$nombreImg;
move_uploaded_file($archivo, $ruta);


    mysqli_query($mysqli,"INSERT INTO historiaclinica (id_historiaClinica, alumno_matricula, p1, p2, p3, p4, p5, p6, p7, p8, imagen) VALUES (NULL, '$alumno_matricula', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8','$ruta')");

    if($mysqli){
    Header("Location: ../vista/historiaClinica.php");
    }else{    
    }


?>