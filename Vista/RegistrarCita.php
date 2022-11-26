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
  
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT e.title,e.descripcion,e.start,a.correo,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),concat_ws(' ',n.nombreNutriologo,n.apellidoPatermo,n.ApellidoMateno) FROM `eventos` e INNER JOIN alumno a on e.matricula_alumno= a.matricula INNER JOIN nutriolgo n ON e.cedula_nutriologo=n.cedula WHERE id='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
  }

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


    <title>web nutricional</title>
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
            </li>
           
           
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['NombreUsuario'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web de nutricion</h1>
    <h5 class="font-weight-bold mb-4 text-center p-4">Registro de dieta</h5>

    <main>
    <form class="formularior" id="formulario" method="post" action="../control/EnviarCorreo.php">


      <!-- Grupo: Nombre Cita  -->
      <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label">Nombre de la cita</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombre" id="nombre" value="<?php echo $row[0]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

       <!-- Grupo: Nombre Cita  -->
      <div class="formulario__grupo" id="grupo__mensaje">
        <label for="mensaje" class="formulario__label">MENSAJE</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="mensaje" id="mensaje" value="<?php echo $row[1]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

       <!-- Grupo: Nombre Cita  -->
      <div class="formulario__grupo" id="grupo__Alumno">
        <label for="Alumno" class="formulario__label">Alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="Alumno" id="Alumno" value="<?php echo $row[4]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Cita -->
      <div class="formulario__grupo" id="grupo__correo">
        <label for="correo" class="formulario__label">correo</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="correo" id="correo" value="<?php echo $row[3]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: inicio -->
      <div class="formulario__grupo" id="grupo__fecha">
         <label for="fecha" class="formulario__label">Fecha de fecha:</label>
         <div class="formulario__grupo-input">
          <input type="datetime-local" class="formulario__input" id="fecha" name="fecha"value="<?php echo $row[2]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
      </div>

       <!-- Grupo: Nombre Cita  -->
      <div class="formulario__grupo" id="grupo__nutriologo">
        <label for="nutriologo" class="formulario__label">Nutriólogo</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nutriologo" id="nutriologo" value="<?php echo $row[5]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>


      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>

  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>