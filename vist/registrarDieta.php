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
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/style/estilos.css" />


    <title>web nutricional</title>
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
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
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
    <h1 class="text-center">Sistema web de nutricion</h1>
    <h5 class="text-center">Registro de dieta</h5>

    <main>
    <!-- Inicia la tabla lunes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Lunes</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->


    <!-- Inicia la tabla Martes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Martes</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th> 
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Miercoles-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Miercoles</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

     <!-- Inicia la tabla Jueves-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Jueves</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Viernes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Viernes</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Sabado-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Sabado</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
    <!-- Inicia la tabla Domingo-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Domingo</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="table table-striped table-bordered">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>