<?php
include("../conexion/connect_db.php");
$cedula =$_POST['cedula'];
$nom = $_POST['nombreNutriologo'];
$pa = $_POST['apellidoPatermo'];
$ma = $_POST['ApellidoMateno'];
$se = $_POST['telefono'];
$pue = $_POST['correo'];
$fechNa = $_POST['contrasenia'];
$unidadR = $_POST['foto'];

    mysqli_query($mysqli,"INSERT INTO nutriolgo (cedula,nombreNutriologo,apellidoPatermo,ApellidoMateno,telefono,correo,contrasenia,foto,rol) VALUES ('$cedula','$nom','$pa','$ma','$se','$pue','$fechNa','$unidadR','2')");

    if($mysqli){
        echo '<script>alert("Se registro correctamente el nutriólogo");
          window.location.href = "../vista/indexAdmin.php";
        </script> ';
    }else {    
    }


?>