<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreNutriologo']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexAdmin.php");
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
    <link rel="stylesheet" href="../vista/style/ESTILOS22.CSS" />


    <title>Web nutrición</title>
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
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/listaHabitosAlimenticios.php">Registro de hábitos alimenticios</a>
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
    <h1 class="text-center">Sistema web de nutrición</h1>
    <h5 class="text-center">Registro de hábitos alimenticios</h5>

    <main>
    <form class="formulario1" id="formulario" method="post" action="../control/agregarHabitos.php">

      <div class="row">
        <div class="col-md-2"></div>
       <div class="col-md-4">
      <!-- Grupo: datos del alumno -->
      <div class="formulario_grupo" id="grupo_alumno_matricula">
        <label for="alumno_matricula" class="formulario__label">Nombre del alumno</label>
        <div class="formulario__grupo-input">
                    <select name="alumno_matricula" class="formulario__input" id="alumno_matricula">
                       <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT * FROM `alumno` WHERE nutriolgo_cedula='$val'";
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


      

      <!-- Grupo: pregunta 1  -->
      <div class="formulario_grupo" id="grupo_p1">
        <label for="p1" class="formulario__label">1. ¿Cuántas veces al día comes?</label>
        <div class="formulario__grupo-input">
                    <select name="p1" class="formulario__input" id="p1">
                        <option value="1x" selected>1x</option>            
                        <option value="2x">2x</option>
                        <option value="3x">3x</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

     <!-- Grupo: pregunta 2  -->
      <div class="formulario_grupo" id="grupo_p2">
        <label for="p2" class="formulario__label">2. ¿Cuál es la comida principal para tí?</label>
        <div class="formulario__grupo-input">
                    <select name="p2" class="formulario__input" id="p2">
                        <option value="Desayuno" selected>Desayuno</option>            
                        <option value="Almuerzo">Almuerzo</option>
                        <option value="Desayuno">Comida</option>
                        <option value="Desayuno">Cena</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
    

      <!-- Grupo: Telefono -->
      <div class="formulario_grupo" id="grupo_p3">
        <label for="p3" class="formulario__label">3 ¿De qué consiste y cómo preparas/está hecha tu comida principal?</label>
        <div class="formulario__grupo-input">
                    <select name="p3" class="formulario__input" id="p3">
                        <option value="Comida casera, fresca, recién hecha" selected>Comida casera, fresca, recién hecha</option> 
                        <option value="Comida en restaurantes">Comida en restaurantes</option>
                        <option value="Comida precocinada y/o congelada">Comida precocinada y/o congelada</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
      </div>
    <div class="col-md-4">


      <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_p4">
        <label for="p4" class="formulario__label">4. ¿Estás o has estado evitando alguna comida por razones de salud?</label>
        <div class="formulario__grupo-input">
                    <select name="p4" class="formulario__input" id="p4">
                        <option value="No" selected>No</option> 
                        <option value="Si">Si</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: Fecha Naciemiento -->
       <div class="formulario_grupo" id="grupo_p5">
        <label for="p5" class="formulario__label">5. ¿Qué porcentaje de tu comida habitual forma la carne?</label>
        <div class="formulario__grupo-input">
                    <select name="p5" class="formulario__input" id="p5">
                        <option value="90% o más" selected>90% o más</option> 
                        <option value="75%">75%</option>
                        <option value="50%">50%</option>
                        <option value="25%">25%</option>
                        <option value="Menos del 25%">Menos del 25%</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>



      <!-- Grupo: Unidad -->
       <div class="formulario_grupo" id="grupo_p6">
        <label for="p6" class="formulario__label">6. ¿Cuánto de tu comida habitual forma la verdura y los productos vegetarianos?</label>
        <div class="formulario__grupo-input">
                    <select name="p6" class="formulario__input" id="p6">
                        <option value="90% o más" selected>90% o más</option> 
                        <option value="75%">75%</option>
                        <option value="50%">50%</option>
                        <option value="25%">25%</option>
                        <option value="Menos del 25%">Menos del 25%</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
    </div>
     </div>
    </div>
<br>
<br>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
     
    </form>
  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>