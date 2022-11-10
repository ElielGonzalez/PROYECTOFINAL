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
    <link rel="stylesheet" href="../vista/style/estilos.css" />
    <link rel="stylesheet" href="../vista/style/multiple.css" />


    <title>Web nutrición</title>
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="font-size:19px ;">
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
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/registroAlumno.php">Registro de alumno</a></li>
                <li><a class="dropdown-item" href="../vista/historiaClinica.php">Registro de historial medico</a></li>
                <li><a class="dropdown-item" href="../vista/registroHabitos1.php">Hábitos alimenticios </a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/resgitroAlimento.php">Gestión de alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/citasCalendario.html">Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/citasCalendario.html">Enviar correo</a>
            </li>
           
            
            <h3 class="text-white">Sistema web de nutricion</h3>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="listaHistoriales.php">Registros</a>
            </li>
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bienvenid@ <?php echo $_SESSION['nombreNutriologo'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold mb-4 text-center p-4">Sistema web servicio social UPEMOR</h1>
    <h5 class="font-weight-bold mb-4 text-center p-4">Registro programa educativo</h5>

    <main>
    <form class="formulario" id="formulario" method="post" action="../control/agregarHistorial.php" enctype="multipart/form-data">
       
    
       
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
        <label for="p1" class="formulario__label">Enfermedad actual</label>
        <div class="formulario__grupo-input">
                    <select name="p1" class="formulario__input" id="p1">
                        <option value="Diabetes" selected>Ninguna</option> 
                        <option value="Diabetes" selected>Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>

                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <h3>Antecedentes heredo familiares</h3>

      <!-- Grupo: pregunta 1  -->
      <div class="formulario_grupo" id="grupo_p2">
        <label for="p2" class="formulario__label">Parentesco:Abuelo paterno</label>
        <div class="formulario__grupo-input">
                    <select name="p2" class="formulario__input" id="p2">
                        <option value="Diabetes" selected>Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>

                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

     <!-- Grupo: pregunta 2  -->
      <div class="formulario_grupo" id="grupo_p3">
        <label for="p3" class="formulario__label">Parentesco:Abuela materna</label>
        <div class="formulario__grupo-input">
                    <select name="p3" class="formulario__input" id="p3">
                        <option value="Diabetes" selected>Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Telefono -->
      <div class="formulario_grupo" id="grupo_p4">
        <label for="p4" class="formulario__label">Parentesco:Padre</label>
        <div class="formulario__grupo-input">
                    <select name="p4" class="formulario__input" id="p4">
                        <option value="Diabetes" selected>Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_p5">
        <label for="p5" class="formulario__label">Parentesco:Madre </label>
        <div class="formulario__grupo-input">
                    <select name="p5" class="formulario__input" id="p5">
                        <option value="Diabetes" selected>Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
      <h2>Antecedentes personales no patológicos</h2>

      <!-- Grupo: Fecha Naciemiento -->
       <div class="formulario_grupo" id="grupo_p6">
        <label for="p6" class="formulario__label">Tabaquismo</label>
        <div class="formulario__grupo-input">
                    <select name="p6" class="formulario__input" id="p6"> 
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>



      <!-- Grupo: Unidad -->
       <div class="formulario_grupo" id="grupo_p7">
        <label for="p7" class="formulario__label">Drogas</label>
        <div class="formulario__grupo-input">
                    <select name="p7" class="formulario__input" id="p7">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
      <!-- Grupo: Unidad -->
       <div class="formulario_grupo" id="grupo_p8">
        <label for="p8" class="formulario__label">Alcohol</label>
        <div class="formulario__grupo-input">
                    <select name="p8" class="formulario__input" id="p8">
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: Unidad -->
       <div class="formulario_grupo" id="grupo_foto">
        <label for="imagen" class="formulario__label">Alcohol</label>
        <input type="file" name="imagen" required>
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

    <script src="../vista/js/mul.js"></script>
  </body>
</html>