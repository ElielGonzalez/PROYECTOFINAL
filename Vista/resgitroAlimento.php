<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
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
              <a class="nav-link active" aria-current="page" href="../vista/citasCalendario.html">Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/citasCalendario.html">Enviar correo</a>
            </li>
           
            
            <h3 class="text-white">Sistema web de nutricion</h3>
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
    <h5 class="text-dark text-center">Registro unidad receptora</h5>

    <main>
    <form class="formulario" id="formulario">


        <!-- Grupo: porcion -->
      <div class="formulario_grupo" id="grupo_porcion">
        <label for="porcion" class="formulario__label">Porcion:</label>
        <div class="formulario__grupo-input">
                    <select name="porcion" class="formulario__input" id="porcion">
                        <option value="unidades" selected>unidades</option>            
                        <option value="gramos">gramos</option>
                        <option value="tazas">tazas</option>
                        <option value="mililitros ">mililitros </option>
                        <option value="porciones">porciones</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>

      <!-- Grupo: nombreAlimento  -->
      <div class="formulario__grupo" id="grupo__nombreAlimento">
        <label for="nombreAlimento" class="formulario__label">Nombre del alimento</label>
        <div class="formulario__grupo-input">
          <input type="list" class="formulario__input" name="nombreAlimento" id="nombreAlimento" placeholder="EJ: avena">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>


      <!-- Grupo: porcion -->
      <div class="formulario_grupo" id="grupo_grupo">
        <label for="grupo" class="formulario__label">grupo:</label>
        <div class="formulario__grupo-input">
                    <select name="grupo" class="formulario__input" id="grupo">
                        <option value="verduras y frutas" selected>verduras y frutas</option>      
                        <option value="cereales y tubérculos">cereales y tubérculos</option>
                        <option value="leguminosas y alimentos de origen animal">leguminosas y alimentos de origen animal</option>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>


      <!-- Grupo: kcal  -->
      <div class="formulario__grupo" id="grupo__kcal">
        <label for="kcal" class="formulario__label">Valor nutrimental en kilo calorias</label>
        <div class="formulario__grupo-input">
          <input type="list" class="formulario__input" name="kcal" id="kcal" placeholder="EJ: 100 g">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>

      <!-- Grupo: grasa  -->
      <div class="formulario__grupo" id="grupo__grasa">
        <label for="grasa" class="formulario__label">Valor nutrimental en gramosm de grasa </label>
        <div class="formulario__grupo-input">
          <input type="list" class="formulario__input" name="grasa" id="grasa" placeholder="EJ: avena">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>

      <!-- Grupo: hCarbono  -->
      <div class="formulario__grupo" id="grupo__hCarbono">
        <label for="hCarbono" class="formulario__label">Valor nutrimental en hidratos de carbono</label>
        <div class="formulario__grupo-input">
          <input type="list" class="formulario__input" name="hCarbono" id="hCarbono" placeholder="EJ: avena">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>

      <!-- Grupo: proteina  -->
      <div class="formulario__grupo" id="grupo__proteina">
        <label for="proteina" class="formulario__label">Nombre del alimento</label>
        <div class="formulario__grupo-input">
          <input type="list" class="formulario__input" name="proteina" id="proteina" placeholder="EJ: avena">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">La descripción debe contener al menos 10 caracteres y máximo 50 </p>
      </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="regAsig()">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formularioGesAlimentos.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>