<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

$val = $_SESSION['cedula'];


    $sql="SELECT * FROM alumno";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
  

  
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enviar correo</title>
</head>
<body>
 <form class="formulario" id="formulario">

       <!-- Grupo: cedula -->
      <div class="formulario__grupo" id="grupo__matricula">
        <label for="matricula" class="formulario__label">Nombre</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="matricula" id="matricula" value="<?php echo $row['nombreAalumno']  ?>" >
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>


      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Descripcion</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreAlumno" id="nombreAlumno" placeholder="EJ: Eliel">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>
</form>

</body>
</html>