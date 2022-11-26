
<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }
  $fe1 = $_POST['fecha1'];
  $fe2 = $_POST['fecha2'];

  $sql="SELECT e.title,e.descripcion,e.start,e.end,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),concat_ws(' ',n.nombreNutriologo,n.apellidoPatermo,n.ApellidoMateno) FROM eventos e INNER JOIN alumno a ON e.matricula_alumno= a.matricula INNER JOIN nutriolgo n on e.cedula_nutriologo=n.cedula WHERE start BETWEEN '$fe1' AND '$fe2'";
  $query=mysqli_query($mysqli,$sql);

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
   <h1 style="font-size:8px, text-aling:center;">Sistema Web de Nutrición</h1>
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Título de la cita</th>
            <th style="text-align: center;">Descripción</th>
            <th style="text-align: center;">Fecha y hora inicio</th>
            <th style="text-align: center;">Fecha y hora fin</th>
            <th style="text-align: center;">Alumno</th>
            <th style="text-align: center;">Nutriólogo</th>
            
          
        </tr>
          
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center;"><?php  echo $row[0]?></td>
              <td style="text-align: center;"><?php  echo $row[1]?></td> 
              <td style="text-align: center;"><?php  echo $row[2]?></td> 
              <td style="text-align: center;"><?php  echo $row[3]?></td> 
              <td style="text-align: center;"><?php  echo $row[4]?></td>  
              <td style="text-align: center;"><?php  echo $row[5]?></td> 
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
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=> false));
?>