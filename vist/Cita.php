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
    <h1 class="text-center">Sistema web de nutricion</h1>
    <h5 class="text-center" >Registro de dieta</h5>

    <main>
    <form class="formularior" id="formulario" method="post" action="../control/agregarCita.php">
      <div class="row">
      <div class="col-5">
      <!-- Grupo: Nombre TITULO  -->
      <div class="formulario__grupo" id="grupo__titulo">
        <label for="titulo" class="formulario__label">titulo de la cita</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="titulo" id="titulo" placeholder="EJ: Cita con Sadra">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

       <!-- Grupo: Nombre descripcion  -->
      <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label">descripcion</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="EJ: Cita con Sadra">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>



    </div>
    <div class="col-5">
      <!-- Grupo: inicio -->
      <div class="formulario__grupo" id="grupo__inicio">
         <label for="inicio" class="formulario__label">Fecha de Inicio:</label>
         <div class="formulario__grupo-input">
          <input type="datetime-local" class="formulario__input" id="inicio" name="inicio">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
      </div>
      <!-- Grupo: fin -->
      <div class="formulario__grupo" id="grupo__fin">
         <label for="fin" class="formulario__label">Fecha de Fin:</label>
         <div class="formulario__grupo-input">
          <input type="datetime-local" class="formulario__input" id="fin" name="fin">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
      </div>


    <!-- Grupo: datos del alumno -->
      <div class="formulario_grupo" id="grupo_nutriolgo_cedula ">
        <label for="nutriolgo_cedula " class="formulario__label">Nombre del alumno</label>
        <div class="formulario__grupo-input">
                    <select name="nutriolgo_cedula" class="formulario__input" id="nutriolgo_cedula">
                       <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT a.matricula,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno) FROM `alumno` a WHERE nutriolgo_cedula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row['matricula'].'">'.$row[1].'</option>';
                        }
                      ?>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


      <!-- Grupo: Nombre de alumno -->
      <div class="formulario__grupo" id="grupo__alumno_matricula">
        <label for="alumno_matricula" class="formulario__label"></label>
        <div class="formulario__grupo-input">
          <input type="hidden" class="formulario__input" name="alumno_matricula" id="alumno_matricula" 

          value="<?php
                        require("../conexion/connect_db.php");
                        
                        $getUnidad = "SELECT n.cedula, concat_ws(' ',n.nombreNutriologo,n.apellidoPatermo,n.ApellidoMateno) FROM nutriolgo n WHERE cedula= '$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo $row[1];
                        }
                      ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>
    </div>


      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>

    </div>
    </form>

  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>