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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/pagina.css" />
    <link rel="stylesheet" href="../vista/style/menu.css" />
    <link rel="stylesheet" href="../vista/CSS1/style.css">

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
     <style>
         .borrada{
             background-color: red;
         }
         #productos{
             height: 50vh;
             overflow-y: scroll;
         }
        #total{
            font-weight: bold;
            font-size: 15px;
        }
     </style>
    <title>Registro Alimentos</title>
  </head>
  <body>
    <!--inicio nav-->
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
    <!---------fin nav-->
    <form class="formulario" id="formulario" method="post" action="../control/cambiarPlanNutriconal.php">

      <!-- Grupo: id gestion aliemntos -->
          <input type="text" class="form-control" id="id" 
          value="<?php echo $row[4]?>">


      <!-- Grupo: Grupo alimenticio  -->
  
        <label >Tipo comida</label>
          <select  class="form-control" id="tipoComida">
                        <option value="<?php echo $row[2]  ?>" selected><?php echo $row[2]  ?></option>
                        <option value="Desayuno" selected>Desayuno</option>          
                        <option value="Media mañana">Media mañana</option>
                        <option value="Comida">Comida</option>
                        <option value="Merienda">Merienda</option>
                        <option value="Cena">Cena</option>
                    </select> 

         <!-- Grupo: Nombre de alumno -->
          <input type="text" class="form-control" id="nombreAlimento" 
          value="<?php echo $row['alumno_matricula']?>">

        <!-- Grupo: Nombre del alimento -->
        <label >Nombre del alimento con valor nutricional</label>
                    <select class="form-control" id="grupo">
                        <option value="<?php echo $row[0]  ?>" selected><?php echo $row[1]  ?></option>
                        <?php
                        while ($row2 = mysqli_fetch_array($query2)) {
                         echo '<option value="'.$row2[0].'">'.$row2[1].'</option>';
                         }
                         ?>
                        
                      ?>
                    </select> 

      
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