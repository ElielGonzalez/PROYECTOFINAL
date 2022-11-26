
<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }
  $matricula = $_POST['matricula'];
  $fe1 = $_POST['fecha1'];
  $fe2 = $_POST['fecha2'];




  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query=mysqli_query($mysqli,$sql);


   $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query1=mysqli_query($mysqli,$sql);

  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query2=mysqli_query($mysqli,$sql);

  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query3=mysqli_query($mysqli,$sql);

  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query4=mysqli_query($mysqli,$sql);

  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query5=mysqli_query($mysqli,$sql);

  $sql="SELECT a.matricula,g.nombreAlimento,p.tipoComida,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gr'),concat_ws(' ',g.hCarbono,'gr'),concat_ws(' ',g.proteina,'gr'),d.fecha FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN resdieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND d.fecha BETWEEN '$fe1' AND ' $fe2' AND a.matricula='$matricula'";
  $query6=mysqli_query($mysqli,$sql);
  

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
    <h1 style="text-align: center; font-size: 28px; ">Reporte de dietas: <?php  echo $matricula?></h1>
    <p style="text-align: center; font-size: 20px; ">Lunes</p>
    <table  class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
            
          
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
              
            </tr>
            <?php } ?>
    </table>

    <p style="text-align: center; font-size: 20px; ">Martes</p>
    <table  class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
          
          
        </tr>
          
            <?php while($row1=mysqli_fetch_array($query1)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row1[0]?></td>
              <td style="text-align: center"><?php  echo $row1[1]?></td> 
              <td style="text-align: center"><?php  echo $row1[2]?></td>
              <td style="text-align: center"><?php  echo $row1[3]?></td>
              <td style="text-align: center"><?php  echo $row1[4]?></td> 
              <td style="text-align: center"><?php  echo $row1[5]?></td>
              <td style="text-align: center"><?php  echo $row1[6]?></td> 
              <td style="text-align: center"><?php  echo $row1[7]?></td> 
            </tr>
            <?php } ?>
    </table>


    <p style="text-align: center; font-size: 20px; ">Miercoles</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
         
          
        </tr>
          
            <?php while($row2=mysqli_fetch_array($query2)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row2[0]?></td>
              <td style="text-align: center"><?php  echo $row2[1]?></td> 
              <td style="text-align: center"><?php  echo $row2[2]?></td>
              <td style="text-align: center"><?php  echo $row2[3]?></td>
              <td style="text-align: center"><?php  echo $row2[4]?></td> 
              <td style="text-align: center"><?php  echo $row2[5]?></td>
              <td style="text-align: center"><?php  echo $row2[6]?></td> 
              <td style="text-align: center"><?php  echo $row2[7]?></td>
            </tr>
            <?php } ?>
    </table>


    <p style="text-align: center; font-size: 20px; ">Jueves</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
            
          
        </tr>
          
            <?php while($row3=mysqli_fetch_array($query3)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row3[0]?></td>
              <td style="text-align: center"><?php  echo $row3[1]?></td> 
              <td style="text-align: center"><?php  echo $row3[2]?></td>
              <td style="text-align: center"><?php  echo $row3[3]?></td>
              <td style="text-align: center"><?php  echo $row3[4]?></td> 
              <td style="text-align: center"><?php  echo $row3[5]?></td>
              <td style="text-align: center"><?php  echo $row3[6]?></td> 
              <td style="text-align: center"><?php  echo $row3[7]?></td>
              
            </tr>
            <?php } ?>
    </table>

<p style="text-align: center; font-size: 20px; ">Viernes</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
            
          
        </tr>
          
            <?php while($row3=mysqli_fetch_array($query3)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row4[0]?></td>
              <td style="text-align: center"><?php  echo $row4[1]?></td> 
              <td style="text-align: center"><?php  echo $row4[2]?></td>
              <td style="text-align: center"><?php  echo $row4[3]?></td>
              <td style="text-align: center"><?php  echo $row4[4]?></td> 
              <td style="text-align: center"><?php  echo $row4[5]?></td>
              <td style="text-align: center"><?php  echo $row4[6]?></td> 
              <td style="text-align: center"><?php  echo $row4[7]?></td> 
              
            </tr>
            <?php } ?>
    </table>

    <p style="text-align: center; font-size: 20px; ">Sabado</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
            
          
        </tr>
          
            <?php while($row3=mysqli_fetch_array($query3)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row5[0]?></td>
              <td style="text-align: center"><?php  echo $row5[1]?></td> 
              <td style="text-align: center"><?php  echo $row5[2]?></td>
              <td style="text-align: center"><?php  echo $row5[3]?></td>
              <td style="text-align: center"><?php  echo $row5[4]?></td> 
              <td style="text-align: center"><?php  echo $row5[5]?></td>
              <td style="text-align: center"><?php  echo $row5[6]?></td> 
              <td style="text-align: center"><?php  echo $row5[7]?></td>
              
            </tr>
            <?php } ?>
    </table>

    <p style="text-align: center; font-size: 20px; ">Domingo</p>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula </th>
            <th style="text-align: center;">Alimento </th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center">Kilocalorías</th>
            <th style="text-align: center">Grasas</th>
            <th style="text-align: center">Hidratos de carbono</th>
            <th style="text-align: center">Proteínas</th>
            <th style="text-align: center;">Fecha</th>
            
          
        </tr>
          
            <?php while($row3=mysqli_fetch_array($query3)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row6[0]?></td>
              <td style="text-align: center"><?php  echo $row6[1]?></td> 
              <td style="text-align: center"><?php  echo $row6[2]?></td>
              <td style="text-align: center"><?php  echo $row6[3]?></td>
              <td style="text-align: center"><?php  echo $row6[4]?></td> 
              <td style="text-align: center"><?php  echo $row6[5]?></td>
              <td style="text-align: center"><?php  echo $row6[6]?></td> 
              <td style="text-align: center"><?php  echo $row6[7]?></td>
              
            </tr>
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
//$dompdf->setPaper('letter');
$dompdf->setPaper('legal','landscape');
$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=> false));
?>