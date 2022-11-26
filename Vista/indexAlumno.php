
<?php

  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAalumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }


$val = $_SESSION['matricula'];


$resultAll = mysqli_query($mysqli,"SELECT * FROM img WHERE alumno='$val' order by id DESC LIMIT 1;");  
  $rowData = mysqli_fetch_array($resultAll);



  $sql2="SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND a.matricula='$val'";
  $query2=mysqli_query($mysqli,$sql2);


  $sql="SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND a.matricula='$val'";
  $query=mysqli_query($mysqli,$sql);


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Web nutricion</title>
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
              <a class="nav-link active" aria-current="page" href="../vista/indexAlumno.php">Inicio</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/galeria.php">Galeria</a>
            </li>


            <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reportes</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li class="nav-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo2" data-whatever="@mdo">Plan nutricional</button>
            </li>
                <li class="nav-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo3" data-whatever="@mdo">Dieta</button>
            </li>
          </ul>









            
            
            
          
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Alumno <?php echo $_SESSION['nombreAalumno'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContra.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="font-weight-bold mb-4 text-center">Sistema web de nutrición</h1>
    <!-- Optional JavaScript; choose one of the two! -->

    <main >
      <div class="row">
      <div class="col-10" ><!--contenedor de horario de comid-->
     <br>
    <p style="text-align: center; font-size: 20px; ">Horario de comidas</p>
    <div class="container table-responsive" style="text-align: center;">

   <!-- <table id="tablax" class="table table-striped table-bordered ">-->

       <table id="tablax" class="table align-middle table-bordered">
        <thead >
            <th style="text-align: center;">Tipo comida</th>
            <th style="text-align: center;">lunes</th>
            <th style="text-align: center">Martes</th>
            <th style="text-align: center">Miercoles</th>
            <th style="text-align: center">Jueves</th>
            <th style="text-align: center">Viernes</th>
            <th style="text-align: center">Sabado</th>
            <th style="text-align: center">Domingo</th>
        </thead>
        <tbody>
        
            <tr class="table-primary">
              <th>Desayuno</th>
              <!-- Optional Desayuno lunes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Desayuno martes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Desayuno Miercoles -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Desayuno Jueves -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

              <!-- Optional Desayuno viernes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Desayuno Sabado -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

               <!-- Optional Desayuno Domningo -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

            </tr>
            <!------############################Media manianda#########-->
            <tr class="table-primary">
              <th>Media mañana</th>
              <!-- Optional Media mañana lunes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Media mañana martes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Media mañana Miercoles -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Media mañana Jueves -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

              <!-- Optional Media mañana viernes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Media mañana Sabado -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

               <!-- Optional Media mañana Domningo -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->

             <!------############################Media manianda#########-->
            <tr class="table-primary">
              <th>Comida</th>
              <!-- Optional Comida lunes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida martes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida Miercoles -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida Jueves -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

               <!-- Optional Comida Domningo -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->

             <!------############################Media manianda#########-->
            <tr class="table-primary">
              <th>Merienda</th>
              <!-- Optional Merienda lunes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Merienda martes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Merienda Miercoles -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Merienda Jueves -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

               <!-- Optional Merienda Domningo -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->

            
              <!------############################Media manianda#########-->
            <tr class="table-primary">
              <th>Cena</th>
              <!-- Optional Cena lunes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Cena martes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Cena Miercoles -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Cena Jueves -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

               <!-- Optional Cena Domningo -->
              <th>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </th>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->
    
            </tbody>
    </table>
    </div>
  </div>
  <div class="col-md-2" style=" background-color: yellow;">
    <th><center><img src="../control/<?php echo $rowData['imagen']; ?>" alt="imagen" style="width: 100px;"></center></th>
    <div class="row">
      <?php
                        require("../conexion/connect_db.php");
                        $vale = $_SESSION['matricula'];
                        $sql88="SELECT h.inicio,h.fin,h.altura,YEAR(CURRENT_DATE)- YEAR(edad),h.peso FROM historiaclinica h WHERE h.alumno_matricula='$vale'";
                        $query44=mysqli_query($mysqli,$sql88);
                        $row777=mysqli_fetch_array($query44);
                      ?>
      <div >
        <!-- Grupo: Nombre Alumno  -->
        <label >Fecha Inicio</label><br>
          <input type="text" value="<?php echo $row777[0]  ?>">
      </div>
       <div>
         <!-- Grupo: Nombre Alumno  -->
        <label >Fecha fin</label><br>
          <input type="text" value="<?php echo $row777[1]  ?>">
      </div>
      <div>


        <form id="formulario">
        <div>
            <label>Altura (cm)</label><input type="number" min="1" max="300" name="altura" value="<?php echo $row777[2]  ?>">
        </div>
        <div>
            <label>Edad</label><input type="" min="1" max="120" name="edad" value="<?php echo $row777[3]?>">
        </div>
        <div>
            <label>Sexo</label><input type="radio" name="sexo" value="M" checked>Mujer<input type="radio" name="sexo" value="H">Hombre
        </div>
        <div>
            <label>Peso (kg)</label><input type="number" min="1" max="300"name="peso"value="<?php echo $row777['peso']?>">
        </div>
 
        <div id="resultado"></div>
 
        <div>
            <input type="submit" value="Calcular" >
        </div>
 
    </form>

      </div>
    </div>
     
         
           
          
       
  </div>
</div>



    <!--nuevo modal-->
<div class="modal fade" id="Ejempo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>



<!--nuevo modal reporte de dieta por alumno-->
<div class="modal fade" id="Ejempo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte  de </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form method="post" action="../vista/reportePlanNAlumno.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="Tipo" class="form-control">Nombre del alumno</label>
                    <select name="Tipo" class="form-control" id="Tipo">       
                        <option value="Desayuno" selected>Desayuno</option>          
                        <option value="Media mañana">Media mañana</option>
                        <option value="Comida">Comida</option>
                        <option value="Merienda">Merienda</option>
                        <option value="Cena">Cena</option>
                    </select>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>
        <form method="post" action="../vista/ReporteFehcasPlanAlumno.php" class="formulario p-3 mb-2">
          <div class="form-group">
             <label for="RangoFech" class="formulario__label">Fecha inicio</label>
                 <input type="datetime-local" class="formulario__input" id="fecha1" name="fecha1">
                 <br>
                 <label for="RangoFech" class="formulario__label">Fecha final</label>
                 <input type="datetime-local" class="formulario__input" id="fecha2" name="fecha2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
        </form>

      </div>
     
    </div>
  </div>
</div>




<!--nuevo modal reporte de dieta por alumno-->
<div class="modal fade" id="Ejempo3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte de dieta por alumno.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../vista/reportecompletoDieta.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="dia" class="form-control">Generar reporte de horario de dieta</label>         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>


         <form method="post" action="../vista/reporteDietaInterfazAlumno.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="dia" class="form-control">Nombre del alumno</label>
                    <select name="dia" class="form-control" id="dia">
                      <option value="Lunes">Lunes</option>         
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>
                        <option value="Domingo">Domingo</option>
                    </select> 


        
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

         <form method="post" action="../vista/ReporteDeDietaInterfazAlumno.php" class="formulario p-3 mb-2">
          <div class="form-group">
             <label for="RangoFech" class="formulario__label">Fecha inicio</label>
                 <input type="datetime-local" class="formulario__input" id="fecha1" name="fecha1">
                 <br>
                 <label for="RangoFech" class="formulario__label">Fecha final</label>
                 <input type="datetime-local" class="formulario__input" id="fecha2" name="fecha2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
        </form>

      </div>
     
    </div>
  </div>
</div>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </main>
    <br>
    <br>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>

      <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                

            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Dirección: Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550</p>
                <p>Tel: (777) 229-3517 </p>        
                <p>Email: informes@upemor.edu.mx</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/upemoroficial/" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/upemoroficial/" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/Upemoroficial" class="fa fa-twitter"></a>
                    <a href="https://www.youtube.com/user/CanalUPEMOR" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Eliel Gonzalez Velazquez</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>


</html>

<script src="../vista/js/pesoideal.js"></script>