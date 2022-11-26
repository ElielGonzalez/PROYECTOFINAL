<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombre']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexAdmin.php");
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


    <title>Servicio social</title>
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="<?php echo $rowData['foto']; ?>" alt="logo" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexAdmin.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroDocente.php">Docente</a></li>
                <li><a class="dropdown-item" href="../vista/registroUnidad.php">Unidad receptora</a></li>
                <li><a class="dropdown-item" href="../vista/programaEducativo.php">Programa Educativo</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/agregarLogo.php">Agregar logo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Base de datos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/respaldo.php">Respaldo</a></li>
                <li><a class="dropdown-item" href="../vista/restauracion.php">Restauración</a></li>
              </ul>
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
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
    <h5 class="text-dark text-center">Registro de habitos alimenticios</h5>

    <main>
    <form class="formulario" id="formulario">

       
      <!-- Grupo: alumno -->
      <div class="formulario_grupo" id="grupo__nombreAlumno">
        <label for="nombreAlumno" class="formulario__label">Selecione nombre del alumno</label>
        <div class="formulario__grupo-input">
                    <select name="nombreAlumno" class="formulario__input" id="nombreAlumno">
                        <?php
                        require("../conexion/connect_db.php");
                        $getprograma = "SELECT * FROM alumno";
                        $getprograma1 = mysqli_query($mysqli,$getprograma);

                        while ($row = mysqli_fetch_array($getprograma1)) {
                          $id=$row['matricula'];
                          $nombre=$row['nombreAlumno'];
                        
                        ?>
                      <option value="<?php echo $id;  ?>"><?php echo $nombre;  ?></option>  
                      <?php 
                        }
                      ?>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>


      <!-- Grupo: nutriologos -->
      <div class="formulario_grupo" id="grupo__nombre">
        <label for="nombre" class="formulario__label">Seleccione nutriologo:</label>
        <div class="formulario__grupo-input">
                    <select name="nombre" class="formulario__input" id="nombre">
                        <?php
                        require("../conexion/connect_db.php");
                        $getprograma = "SELECT * FROM nutriolgo";
                        $getprograma1 = mysqli_query($mysqli,$getprograma);

                        while ($row = mysqli_fetch_array($getprograma1)) {
                          $id=$row['cedula'];
                          $nombre=$row['nombre'];
                        
                        ?>
                      <option value="<?php echo $id;  ?>"><?php echo $nombre;  ?></option>  
                      <?php 
                        }
                      ?>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>

      <!-- Grupo: pregunta 1  -->
      <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">1. ¿Cuántas veces al día comes?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>1x</option>            
                        <option value="2">2x</option>
                        <option value="3">3x</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

     <!-- Grupo: pregunta 2  -->
      <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">2. ¿Cuál es la comida principal para tí?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>Desayuno</option>            
                        <option value="2">Almuerzo</option>
                        <option value="3">Desayuno</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
      <!-- Grupo: Telefono -->
      <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">3 ¿De qué consiste y cómo preparas/está hecha tu comida principal?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>Comida casera, fresca, recién hecha</option> 
                        <option value="2">Comida en restaurantes</option>
                        <option value="3">Comida precocinada y/o congelada</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">4. ¿Estás o has estado evitando alguna comida por razones de salud?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>No</option> 
                        <option value="2">Si</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: Fecha Naciemiento -->
       <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">9. ¿Qué porcentaje de tu comida habitual forma la carne?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>90% o más</option> 
                        <option value="2">75%</option>
                        <option value="2">50%</option>
                        <option value="2">25%</option>
                        <option value="2">Menos del 25%</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>



      <!-- Grupo: Unidad -->
       <div class="formulario_grupo" id="grupo_genero">
        <label for="genero" class="formulario__label">10. ¿Cuánto de tu comida habitual forma la verdura y los productos vegetarianos?</label>
        <div class="formulario__grupo-input">
                    <select name="genero" class="formulario__input" id="genero">
                        <option value="1" selected>90% o más</option> 
                        <option value="2">75%</option>
                        <option value="2">50%</option>
                        <option value="2">25%</option>
                        <option value="2">Menos del 25%</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      
      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="reg()">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formulario.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>