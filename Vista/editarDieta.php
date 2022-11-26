<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT d.id_dieta,d.dia,d.id_planAlimenticio,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.id_dieta ='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
  }

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT d.id_dieta,d.dia,d.id_planAlimenticio,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.id_dieta";
    $query2=mysqli_query($mysqli,$sql);
    $row2=mysqli_fetch_array($query2);
  }

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">




    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/ESTILOS22.CSS" />
     
    <title>Registro Alimentos</title>
  </head>
  <body>
    <!--inicio nav-->
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
    <h5 class="text-dark text-center">Editar dieta</h5>
    <!---------fin nav-->
    <form class="formulario1" id="formulario" method="post" action="../control/cambiarDieta.php">

      <!-- Grupo: id gestion aliemntos -->
          <input type="hidden" class="formulario__input" name="id" id="id"  
          value="<?php echo $row[0]?>">


          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
      <div class="formulario_grupo" id="grupo_dia">
        <label for="dia" class="formulario__label text-dark">Día de la semana</label>
        <div class="formulario__grupo-input">
                    <select name="dia" class="formulario__input" id="dia">
                    <option value="<?php echo $row[1]  ?>" selected><?php echo $row[1]  ?></option>
                        <option value="Lunes">Lunes</option>         
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>
                        <option value="Domingo">Domingo</option>

                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona un grupo.</p>
      </div>




        <!-- Grupo: topi de comida con usuario -->
        <div class="formulario_grupo" id="grupo_tipoComida">
        <label class="formulario__label text-dark">Tipo de comida y nombre del alimento</label>
                    <select class="formulario__input" name="tipoComida" id="tipoComida">
                        <option value="<?php echo $row[2]  ?>" selected><?php echo $row[3]  ?></option>

                        <?php
                        while ($row2 = mysqli_fetch_array($query2)) {
                         echo '<option value="'.$row2[2].'">'.$row2[3].'</option>';
                         }
                         ?>

                      
                    </select> 
        </div>
      </div>
    </div>

      
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Enviar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>
      
    </form>
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../vista/js/registroPlan.js"></script>

  </body>
</html>