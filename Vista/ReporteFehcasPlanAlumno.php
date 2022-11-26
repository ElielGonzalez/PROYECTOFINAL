
<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAalumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }

  $matricula = $_SESSION['matricula'];
  $fe1 = $_POST['fecha1'];
  $fe2 = $_POST['fecha2'];

  

  ob_start();

  
?>
<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
    
    <!-- Inicia la tabla Desayuno -->
    <?php
  $sql="SELECT p.id_planAlimenticio,g.porcion,g.nombreAlimento,p.tipoComida,g.grupo,g.kcal,g.grasa,g.hCarbono,g.proteina,p.fecha_actai from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.fecha_actai BETWEEN '$fe1' AND '$fe2' AND p.tipoComida='Desayuno' AND a.matricula= '$matricula'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <p style="text-align: center; font-size: 20px; ">Desayuno</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Porciones</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Grupo alimenticio</th>
            <th style="text-align: center">kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Carbohidratos</th>
            <th style="text-align: center">Proteína</th>
            <th style="text-align: center">Fecha y Hora</th>
        </tr>
       
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td>
              <td style="text-align: center"><?php  echo $row[2]?></td>
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td>
              <td style="text-align: center"><?php  echo $row[5]?></td>
              <td style="text-align: center"><?php  echo $row[6]?></td>
              <td style="text-align: center"><?php  echo $row[7]?></td> 
              <td style="text-align: center"><?php  echo $row[8]?></td>
              <td style="text-align: center"><?php  echo $row[9]?></td>      

            <?php } ?>
    </table>
    <!-- fin tabla media maniana-->
    



     <!-- Inicia la tabla Desayuno -->
    <?php
  $sql="SELECT p.id_planAlimenticio,g.porcion,g.nombreAlimento,p.tipoComida,g.grupo,g.kcal,g.grasa,g.hCarbono,g.proteina,p.fecha_actai from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.fecha_actai BETWEEN '$fe1' AND '$fe2' AND p.tipoComida='Media mañana' AND a.matricula= '$matricula'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <p style="text-align: center; font-size: 20px; ">Media mañana</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Porciones</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Grupo alimenticio</th>
            <th style="text-align: center">kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Carbohidratos</th>
            <th style="text-align: center">Proteína</th>
            <th style="text-align: center">Fecha y Hora</th>
        </tr>
       
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td>
              <td style="text-align: center"><?php  echo $row[2]?></td>
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td>
              <td style="text-align: center"><?php  echo $row[5]?></td>
              <td style="text-align: center"><?php  echo $row[6]?></td>
              <td style="text-align: center"><?php  echo $row[7]?></td> 
              <td style="text-align: center"><?php  echo $row[8]?></td>
              <td style="text-align: center"><?php  echo $row[9]?></td>   

            <?php } ?>
    </table>
    <!-- fin tabla media maniana-->
    
    <!-- fin tabla media maniana-->


    <!-- Inicia la tabla Comida -->
   


    <!-- Inicia la tabla Desayuno -->
    <?php
  $sql="SELECT p.id_planAlimenticio,g.porcion,g.nombreAlimento,p.tipoComida,g.grupo,g.kcal,g.grasa,g.hCarbono,g.proteina,p.fecha_actai from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.fecha_actai BETWEEN '$fe1' AND '$fe2' AND p.tipoComida='Comida' AND a.matricula= '$matricula'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <p style="text-align: center; font-size: 20px; ">Comida</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Porciones</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Grupo alimenticio</th>
            <th style="text-align: center">kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Carbohidratos</th>
            <th style="text-align: center">Proteína</th>
            <th style="text-align: center">Fecha y Hora</th>
        </tr>
       
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td>
              <td style="text-align: center"><?php  echo $row[2]?></td>
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td>
              <td style="text-align: center"><?php  echo $row[5]?></td>
              <td style="text-align: center"><?php  echo $row[6]?></td>
              <td style="text-align: center"><?php  echo $row[7]?></td> 
              <td style="text-align: center"><?php  echo $row[8]?></td>  
              <td style="text-align: center"><?php  echo $row[9]?></td> 

            <?php } ?>
    </table>
    <!-- fin tabla media maniana-->
    <!-- fin tabla comida-->


    <!-- Inicia la tabla Merienda -->
    


     <?php
  $sql="SELECT p.id_planAlimenticio,g.porcion,g.nombreAlimento,p.tipoComida,g.grupo,g.kcal,g.grasa,g.hCarbono,g.proteina,p.fecha_actai from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.fecha_actai BETWEEN '$fe1' AND '$fe2' AND p.tipoComida='Merienda' AND a.matricula= '$matricula'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <p style="text-align: center; font-size: 20px; ">Merienda</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Porciones</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Grupo alimenticio</th>
            <th style="text-align: center">kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Carbohidratos</th>
            <th style="text-align: center">Proteína</th>
            <th style="text-align: center">Fecha y Hora</th>
        </tr>
       
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td>
              <td style="text-align: center"><?php  echo $row[2]?></td>
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td>
              <td style="text-align: center"><?php  echo $row[5]?></td>
              <td style="text-align: center"><?php  echo $row[6]?></td>
              <td style="text-align: center"><?php  echo $row[7]?></td> 
              <td style="text-align: center"><?php  echo $row[8]?></td>  
              <td style="text-align: center"><?php  echo $row[9]?></td> 

            <?php } ?>
    </table>
    <!-- fin tabla media maniana-->

    

    <!-- Inicia la tabla cena -->
   <?php
  $sql="SELECT p.id_planAlimenticio,g.porcion,g.nombreAlimento,p.tipoComida,g.grupo,g.kcal,g.grasa,g.hCarbono,g.proteina,p.fecha_actai from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.fecha_actai BETWEEN '$fe1' AND '$fe2' AND p.tipoComida='Cena' AND a.matricula= '$matricula'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <p style="text-align: center; font-size: 20px; ">Cena</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Porciones</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Grupo alimenticio</th>
            <th style="text-align: center">kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Carbohidratos</th>
            <th style="text-align: center">Proteína</th>
            <th style="text-align: center">Fecha y Hora</th>
        </tr>
       
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td>
              <td style="text-align: center"><?php  echo $row[2]?></td>
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td>
              <td style="text-align: center"><?php  echo $row[5]?></td>
              <td style="text-align: center"><?php  echo $row[6]?></td>
              <td style="text-align: center"><?php  echo $row[7]?></td> 
              <td style="text-align: center"><?php  echo $row[8]?></td>  
              <td style="text-align: center"><?php  echo $row[9]?></td> 

            <?php } ?>
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
//$dompdf->setPaper('A4','landscape');
$dompdf->setPaper('legal','landscape');
$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=> false));
?>