<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreNutriologo']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }


  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM alumno WHERE matricula='$id'";
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
    <!--<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


    <title>Servicio nutricional</title>
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
          
            <
            </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['nombreProfesor'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraDo.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web de nutricion</h1>
    <h5 class="text-dark text-center p-3">Editar alumno</h4>

    <main>
    <form class="formulario" id="formulario">

       <!-- Grupo: cedula -->
      <div class="formulario__grupo" id="grupo__matricula">
        <label for="matricula" class="formulario__label">matricula</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="matricula" id="matricula" value="<?php echo $row['matricula']  ?>" >
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Nombre alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreAlumno" id="nombreAlumno" value="<?php echo $row['nombreAalumno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPpaterno">
        <label for="apellidoPpaterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoPpaterno" id="apellidoPpaterno" value="<?php echo $row['apellifoPaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__apellidoMaterno">
        <label for="apellidoMaterno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoMaterno" id="apellidoMaterno" value="<?php echo $row['ApellidoMaterno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

        <!-- Grupo: Sexo -->
      <div class="formulario_grupo" id="grupo_sexo">
        <label for="sexo" class="formulario__label">Sexo:</label>
        <div class="formulario__grupo-input">
                    <select name="sexo" class="formulario__input" id="sexo">
                        <option value="Hombre" selected>Hombre</option>            
                        <option value="Mujer">Mujer</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: carrera -->
      <!-- Grupo: Cuatrimestre -->
      <div class="formulario_grupo" id="grupo_carrera_alumno">
        <label for="carrera_alumno" class="formulario__label">carrera_alumno:</label>
        <div class="formulario__grupo-input">
                    <select name="carrera_alumno" class="formulario__input" id="carrera_alumno">
                        <option value="ITI" selected>ITI</option>            
                        <option value="ITA">ITA</option>
                        <option value="IET">IET</option>            
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Grupo -->
      <div class="formulario_grupo" id="grupo_grupo_alumno">
        <label for="grupo_alumno" class="formulario__label">Grupo:</label>
        <div class="formulario__grupo-input">
                    <select name="grupo_alumno" class="formulario__input" id="grupo_alumno">
                        <option value="A" selected>A</option>            
                        <option value="B">B</option>
                        <option value="C">C</option>            
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Cuatrimestre -->
      <div class="formulario_grupo" id="grupo_cuatrimestre">
        <label for="cuatrimestre" class="formulario__label">Cuatrimestre:</label>
        <div class="formulario__grupo-input">
                    <select name="cuatrimestre" class="formulario__input" id="cuatrimestre">
                        <option value="<?php echo $row['cuatrimestre']  ?>" selected><?php echo $row['cuatrimestre'] ?></option>            
                        <option value="1" >1 cuatrimestre</option>            
                        <option value="2">2 cuatrimestre</option>
                        <option value="3">3 cuatrimestre</option>            
                        <option value="4">4 cuatrimestre</option>
                        <option value="5">5 cuatrimestre</option>
                        <option value="6">6 cuatrimestre</option>            
                        <option value="7">7 cuatrimestre</option>
                        <option value="8">8 cuatrimestre</option>            
                        <option value="9">9 cuatrimestre</option>
                        <option value="10">10 cuatrimestre</option>
                        <option value="11">11 cuatrimestre</option>
                        <option value="12">12 cuatrimestre</option>            
                        <option value="13">13 cuatrimestre</option>
                        <option value="14">14 cuatrimestre</option>            
                        <option value="15">15 cuatrimestre</option>          
                       
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: correo-->
      <div class="formulario__grupo" id="grupo__correo">
        <label for="correo" class="formulario__label">correo:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="correo" id="correo" value="<?php echo $row['correo']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>
      <!-- Grupo: contrasenia-->
      <div class="formulario__grupo" id="grupo__contrasenia">
        <label for="contrasenia" class="formulario__label">Contrasenia:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="contrasenia" id="contrasenia" value="<?php echo $row['contrasenia']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>


      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="actAlumno();">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>
  <script src="../vista/js/formularioAlumno.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>