<?php
include("../conexion/connect_db.php");
$cedula=$_POST['cedula'];
$nombreNutriologo = $_POST['nombreNutriologo'];
$apellidoPatermo = $_POST['apellidoPatermo'];
$ApellidoMateno = $_POST['ApellidoMateno'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];
$foto = $_POST['foto'];


    mysqli_query($mysqli,"UPDATE nutriolgo SET
            nombreNutriologo = '$nombreNutriologo',
            apellidoPatermo = '$apellidoPatermo',
            ApellidoMateno = '$ApellidoMateno',
            telefono = '$telefono', 
            correo = '$correo',
            contrasenia = '$contrasenia', 
            foto = '$foto' WHERE nutriolgo.cedula = '$cedula'");

    if($mysqli){
    Header("Location: ../vista/indexAdmin.php");
    }else {    
    
    }


?>