
<!doctype html>
<?php

  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAalumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }
ob_start();

  
?>
<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>genarar reporte alumno</title>
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
</style>
</head>
<body>

  <p style="text-align: center; font-size: 20px; ">Lunes</p>
    <table  id="customers" class="table">
        <tr>
            <th style="text-align: center;">Tipo comida</th>
            <th style="text-align: center;">lunes</th>
            <th style="text-align: center">Martes</th>
            <th style="text-align: center">Miercoles</th>
            <th style="text-align: center">Jueves</th>
            <th style="text-align: center">Viernes</th>
            <th style="text-align: center">Sabado</th>
            <th style="text-align: center">Domingo</th> 
        </tr>
          
            <tr>
              <td>Desayuno</td>
               <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                         echo '<br>';
                        }
                      ?>
              </td>
              <!-- Optional Desayuno martes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>

               <!-- Optional Desayuno Miercoles -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Desayuno Jueves -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

              <!-- Optional Desayuno viernes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Desayuno Sabado -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

               <!-- Optional Desayuno Domningo -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Desayuno' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
            </tr>
            <!------############################Media manianda#########-->
            <tr class="table-primary">
              <td>Media mañana</td>
              <!-- Optional Media mañana lunes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Media mañana martes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Media mañana Miercoles -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Media mañana Jueves -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

              <!-- Optional Media mañana viernes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Media mañana Sabado -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

               <!-- Optional Media mañana Domningo -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Media mañana' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

            </tr>

             <!------############################Media manianda#########-->
            <tr class="table-primary">
              <td>Comida</td>
              <!-- Optional Comida lunes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida martes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida Miercoles -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida Jueves -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

               <!-- Optional Comida Domningo -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Comida' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->
            <!------############################Media manianda#########-->
            <tr class="table-primary">
              <td>Merienda</td>
              <!-- Optional Merienda lunes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Merienda martes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Merienda Miercoles -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Merienda Jueves -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

               <!-- Optional Merienda Domningo -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Merienda' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

            </tr>
            <!--**********Fin media maniana-->

            
              <!------############################Media manianda#########-->
            <tr class="table-primary">
              <td>Cena</td>
              <!-- Optional Cena lunes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Cena martes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Cena Miercoles -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Cena Jueves -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT g.nombreAlimento FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

              <!-- Optional Comida viernes -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',p.tipoComida,g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 
              <!-- Optional Comida Sabado -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

               <!-- Optional Cena Domningo -->
              <td>
               <?php
                        require("../conexion/connect_db.php");
                        $val = $_SESSION['matricula'];
                        $getUnidad = "SELECT concat_ws(' ',g.nombreAlimento) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND p.tipoComida='Cena' AND a.matricula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                        }
                      ?>
              </td>
              <!-- ******************* --> 

            </tr>
    </table>

</body>
</html>
<?php
$html=ob_get_clean();
//echo $html;
require_once '../vista/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options =$dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
//$dompdf->setPaper('letter');
$dompdf->setPaper('legal','landscape');
$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=> false));
?>