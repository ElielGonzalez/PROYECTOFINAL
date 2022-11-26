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
   <!-- <link rel="stylesheet" href="../vista/style/multiple.css" />-->


    <title>Registro de historial médico</title>
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
              <a class="nav-link active" aria-current="page" href="../vista/listaHistoriales.php">Registros de historiales médicos</a>
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
    <h1 class="font-weight-bold  text-center ">Sistema web de nutrición</h1>
    <h5 class="font-weight-bold  text-center p-4">Registro de historial médico</h5>

    <main>
    <form  method="post" action="../control/agregarHistorial.php" enctype="multipart/form-data">
       
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
        <label for="p1" class="formulario__label">Enfermedad actual</label>
        <div class="formulario__grupo-input">
                    <select name="p1" class="formulario__input" id="p1">
                        <option value="Ninguna" selected>Ninguna</option> 
                        <option value="Diabetes" >Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>

                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: Datso personales -->
      <div class="formulario_grupo" id="grupo_edad">
        <label for="edad" class="formulario__label">Fecha de nacimiento</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" id="edad" name="edad"
                 value="1922-11-13"
                 min="1990-01-01" max="2000-12-31">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

<h3 style="text-align: center;">Antecedentes heredo familiares</h3>
      <!-- Grupo: pregunta 1  -->
      <div class="formulario_grupo" id="grupo_p2">
        <label for="p2" class="formulario__label">Parentesco:Abuelo paterno</label>
        <div class="formulario__grupo-input">
                    <select name="p2" class="formulario__input" id="p2">
                        <option value="Ninguna" selected>Ninguna</option> 
                        <option value="Diabetes" >Diabetes</option>            
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
                        <option value="Ninguna" selected>Ninguna</option> 
                        <option value="Diabetes" >Diabetes</option>            
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
                        <option value="Ninguna" selected>Ninguna</option> 
                        <option value="Diabetes" >Diabetes</option>            
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
                      <option value="Ninguna" selected>Ninguna</option> 
                        <option value="Diabetes" >Diabetes</option>            
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
    </div>

    <div class="col-md-4">
 
      <h4 style="text-align: center;">Antecedentes personales no patológicos</h4>

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
  
  
      <!-- Grupo: Datso personales -->
      <div class="formulario_grupo" id="grupo_inicio">
        <label for="inicio" class="formulario__label">Fecha inicio de la dieta</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" id="inicio" name="inicio"
                 value="2017-01-01"
                 min="2017-01-01" max="2022-12-31">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


        <!-- Grupo: Puesto -->
      <div class="formulario_grupo" id="grupo_fin">
        <label for="fin" class="formulario__label">Fecha fin de la dieta</label>
        <div class="formulario__grupo-input">
          <input type="date" class="formulario__input" id="fin" name="fin"
                 value="2022-11-"
                 min="2017-01-01" max="2022-12-31">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>



       <!-- Grupo: Altura -->
      <div class="formulario_grupo" id="grupo_altura">
        <label for="altura" class="formulario__label">Altura en (cm)</label>
        <div class="formulario__grupo-input">
          <input class="formulario__input" type="number" min="1" max="300" name="altura">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

       

      <!-- Grupo: peso -->
      <div class="formulario_grupo" id="grupo_peso">
        <label for="peso" class="formulario__label">Peso en (kg)</label>
        <div class="formulario__grupo-input">
          <input class="formulario__input" type="number" min="1" max="300" name="peso">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
    </div>
    </div>
  

  
  <br>
  <br>
    <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Guardar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../vista/js/mul.js"></script>
  </body>
</html>