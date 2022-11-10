<?php
include("../conexion/connect_db.php");
$cod = $_POST['matricula'];
$nombreAalumno = $_POST['nombreAlumno'];
$apellifoPaterno = $_POST['apellidoPpaterno'];
$ApellidoMaterno = $_POST['apellidoMaterno'];
$feIn = $_POST['sexo'];
$feFi = $_POST['carrera_alumno'];
$telAl = $_POST['grupo_alumno'];
$gen = $_POST['cuatrimestre'];
$gru = $_POST['correo'];
$g = $_POST['contrasenia'];

    mysqli_query($mysqli,"UPDATE alumno SET
        nombreAalumno = '$nombreAalumno',
        apellifoPaterno = '$apellifoPaterno',
        ApellidoMaterno = '$ApellidoMaterno',
        sexo = '$feIn',
        carrera_alumno = '$feFi',
        grupo_alumno = '$telAl',
        cuatrimestre = '$gen',
        correo = '$gru',
        contrasenia = '$g' WHERE alumno.matricula = '$cod'");



?>