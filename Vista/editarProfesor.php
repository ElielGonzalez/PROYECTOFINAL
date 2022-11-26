<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombre']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['Rol']!=1) {
    header("Location:../vista/indexAdmin.php");
  }

  $sql1="SELECT * FROM nutriolgo";
  $query1=mysqli_query($mysqli,$sql1);


  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM nutriolgo WHERE cedula='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row1=mysqli_fetch_array($query);
  }

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


    <title>Servicio social</title>
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
              <a class="nav-link active" style="font-size:24px;color:white;" aria-current="page" href="../vista/indexAdmin.php">Inicio</a>
            </li>

          
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="font-size:24px;color:white;" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrador <?php echo $_SESSION['nombre'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold text-center">Sistema web de nutrición</h1>
    <h5 class="text-dark text-center">Registro nutriólogo</h5>

    
    <main>
    <form class="formulario" id="formulario">

       <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__cedula">
        <div class="formulario__grupo-input">
          <input type="hidden" class="formulario__input" name="cedula" id="cedula" value="<?php echo $row1['cedula']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

       

      <!-- Grupo: Nombre Alumno  -->
      <div class="formulario__grupo" id="grupo__nombreNutriologo">
        <label for="nombreNutriologo" class="formulario__label">nombre Nutriologo</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombreNutriologo" id="nombreNutriologo" value="<?php echo $row1['nombreNutriologo']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Paterno -->
      <div class="formulario__grupo" id="grupo__apellidoPatermo">
        <label for="apellidoPatermo" class="formulario__label">Apellido paterno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellidoPatermo" id="apellidoPatermo" value="<?php echo $row1['apellidoPatermo']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Apellido Materno -->
      <div class="formulario__grupo" id="grupo__ApellidoMateno">
        <label for="ApellidoMateno" class="formulario__label">Apellido Materno</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="ApellidoMateno" id="ApellidoMateno" value="<?php echo $row1['ApellidoMateno']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

      <!-- Grupo: Telefono -->
      <div class="formulario__grupo" id="grupo__telefono">
        <label for="telefono" class="formulario__label">Teléfono</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="telefono" id="telefono" value="<?php echo $row1['telefono']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>


      <!-- Grupo: CORREO -->
      <div class="formulario__grupo" id="grupo__correo">
        <label for="correo" class="formulario__label">correo</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="correo" id="correo" value="<?php echo $row1['correo']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>
      <!-- Grupo: Fecha Naciemiento -->
       <div class="formulario__grupo" id="grupo__contrasenia">
        <label for="contrasenia" class="formulario__label">Contraseña</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="contrasenia" id="contrasenia" value="<?php echo $row1['contrasenia']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>
      <!-- Grupo: Unidad -->
      <div class="formulario__grupo" id="grupo__foto">
        <label for="foto" class="formulario__label">foto</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="foto" id="foto" value="<?php echo $row1['foto']  ?>">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El apellido M tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>




      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn" onclick="actProfe()">Actualizar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
    </form>
  </main>

  <script src="../vista/js/formulario.js"></script>
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