<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
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
    <h1 class="text-center">Sistema web de nutricion</h1>
    <h5 class="text-center">Registro de plan nutricional</h5>

    <main>
  

    <!-- Inicia la tabla Desayuno -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Desayuno' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Desayuno</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->



    <!-- Inicia la tabla media maniana -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Media mañana' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Median maniana</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->


    <!-- Inicia la tabla Comida -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Comida' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Comida</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla comida-->


    <!-- Inicia la tabla Merienda -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Merienda' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Merienda</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    

    <!-- Inicia la tabla cena -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Cena' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Cena</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Apellido P</th>
            <th style="text-align: center">Apellido M</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
               <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
             
              <<th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
  </main>
  <script type="text/javascript">

        function confirmarEliminarAlu(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>