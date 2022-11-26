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
    <link rel="stylesheet" href="../vista/style/ESTILOS22.CSS" />


    <title>Sistema nutricional</title>
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="font-size:19px ;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/historiaClinica.php">Registro de historial médico</a></li>
                <li><a class="dropdown-item" href="../vista/registroHabitos1.php">Hábitos alimenticios </a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/tt.html">Gestión de alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/cita.php">Citas</a>
            </li>
           
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutriólogo:  <?php echo $_SESSION['nombreNutriologo'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="text-dark text-center">Sistema web de nutrición</h1>
    
    <h3 class="text-dark text-center">Editar Paciente</h3>

    <main>
    <form class="formulario1" id="formulario">
      <div class="row">
        <div class="col-md-3">

      <!-- Grupo: cedula -->
      <div class="formulario__grupo" id="grupo__matricula">
        <label for="matricula" class="formulario__label">Matrícula</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="matricula" id="matricula" value="<?php echo $row[0]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La Matrícula tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>


      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Nombre del alumno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreAlumno" id="nombreAlumno" value="<?php echo $row[1]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPpaterno">
        <label for="apellidoPpaterno" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoPpaterno" id="apellidoPpaterno" value="<?php echo $row[2]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>
    </div>
    <div class="col-md-3">

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__apellidoMaterno">
        <label for="apellidoMaterno" class="formulario__label">Apellido materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoMaterno" id="apellidoMaterno" value="<?php echo $row[3] ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

        <!-- Grupo: Sexo -->
      <div class="formulario_grupo" id="grupo_sexo">
        <label for="sexo" class="formulario__label">Género:</label>
        <div class="formulario__grupo-input">
                    <select name="sexo" class="formulario__input" id="sexo">
                      <option value="<?php echo $row[4]  ?>" selected><?php echo $row[4] ?></option> 
                        <option value="Hombre" >Hombre</option>            
                        <option value="Mujer">Mujer</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: carrera -->
      <!-- Grupo: Cuatrimestre -->
      <div class="formulario_grupo" id="grupo_carrera_alumno">
        <label for="carrera_alumno" class="formulario__label">Carrera:</label>
        <div class="formulario__grupo-input">
                    <select name="carrera_alumno" class="formulario__input" id="carrera_alumno">
                      <option value="<?php echo $row[5]  ?>" selected><?php echo $row[5] ?></option>
                        <option value="ITI">ITI</option>            
                        <option value="IFI">IFI</option>
                        <option value="IET">IET</option>
                        <option value="IIN">IIN</option>
                        <option value="ITA">ITA</option>
                        <option value="IBT">IBT</option>
                        <option value="LAG">LAG</option>            
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
    </div>

    <div class="col-md-3">

      <!-- Grupo: Grupo -->
      <div class="formulario_grupo" id="grupo_grupo">
        <label for="grupo" class="formulario__label">Grupo:</label>
        <div class="formulario__grupo-input">
                    <select name="grupo" class="formulario__input" id="grupo">
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
                        <option value="<?php echo $row[7]  ?>" selected><?php echo $row[7] ?></option>
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
        <label for="correo" class="formulario__label">Correo electrónico:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="correo" id="correo" value="<?php echo $row[8]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>
    </div>
    <div class="col-md-3">

      <!-- Grupo: contrasenia-->
      <div class="formulario__grupo" id="grupo__contrasenia">
        <label for="contrasenia" class="formulario__label">Contraseña:</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="contrasenia" id="contrasenia" value="<?php echo $row[9]  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos</p>
      </div>

      <!-- Grupo: nutriolgo_cedula -->
      <div class="formulario_grupo" id="grupo_nutriolgo_cedula">
        <label for="nutriolgo_cedula" class="formulario__label">Cédula del nutriólogo</label>
        <div class="formulario__grupo-input">
                    <select name="nutriolgo_cedula" class="formulario__input" id="nutriolgo_cedula">
                       <option value="<?php echo $row[11]  ?>" selected><?php echo $row[11] ?></option>
                    </select> 



          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>
    </div>

    </div>
      
      
      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="actAlumno()">Actualizar datos</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formularioAlumno.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>