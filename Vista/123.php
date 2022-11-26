<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreNutriologo']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexAdmin.php");
  }
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT idGesAlimento,concat_ws(' ',nombreAlimento,kcal, grasa,hCarbono,proteina),tipoComida,p.alumno_matricula,id_planAlimenticio from gestionalimentos INNER JOIN plannutricional p on gestionAlimentos_idGesAlimento = gestionalimentos.idGesAlimento WHERE id_planAlimenticio ='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
  }

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT idGesAlimento,concat_ws(' ',nombreAlimento,kcal, grasa,hCarbono,proteina),tipoComida,p.alumno_matricula from gestionalimentos INNER JOIN plannutricional p on gestionAlimentos_idGesAlimento = gestionalimentos.idGesAlimento WHERE id_planAlimenticio";
    $query2=mysqli_query($mysqli,$sql);
    $row2=mysqli_fetch_array($query2);
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
    <link rel="stylesheet" href="../vista/style/ESTILOS22.CSS" />
   <!-- <link rel="stylesheet" href="../vista/style/multiple.css" />-->


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
    <h5 class="text-dark text-center">Consulta y edición del plan nutricional</h5>

    <main>
    <form  method="post" action="../control/cambiarPlanNutriconal.php" enctype="multipart/form-data">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
     <!-- Grupo: id gestion aliemntos -->
          <input type="hidden" class="formulario__input" name="id" id="id" 
          value="<?php echo $row[4]?>">


      <!-- Grupo: pregunta 1  -->
      <div class="formulario_grupo" id="grupo_tipoComida">
        <label for="tipoComida" class="formulario__label">Tipo de comida</label>
        <div class="formulario__grupo-input">
                    <select name="tipoComida" class="formulario__input" id="tipoComida">
                    <option value="<?php echo $row[2]  ?>" selected><?php echo $row[2]  ?></option>
                     <option value="Desayuno" selected>Desayuno</option>          
                        <option value="Media mañana">Media mañana</option>
                        <option value="Comida">Comida</option>
                        <option value="Merienda">Merienda</option>
                        <option value="Cena">Cena</option>

                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>
      
      <!-- Grupo: Nombre de alumno -->
          <input type="hidden" class="formulario__input" name="matricula" id="matricula" 
          value="<?php echo $row['alumno_matricula']?>">

        <!-- Grupo: Nombre del alimento -->
        <label for="tipoComida" class="formulario__label">Nombre del alimento con valor nutricional</label>
                    <select class="formulario__input" name="grupo" id="grupo">
                        <option value="<?php echo $row[0]  ?>" selected><?php echo $row[1]  ?></option>
                        <?php
                        while ($row2 = mysqli_fetch_array($query2)) {
                         echo '<option value="'.$row2[0].'">'.$row2[1].'</option>';
                         }
                         ?>
                        
                      ?>
                    </select> 

               </div>     

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