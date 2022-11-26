
<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }
  $Genero = $_POST['Enfermedad'];


  $sql="SELECT * FROM `historiaclinica` WHERE p6='$Genero'";
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
    <table class="table" id="customers">
        <tr>
            <th style="text-align: center;">Matricula del alumno</th>
            <th style="text-align: center;">Enfermedad actual</th>
            <th style="text-align: center;">Parentesco:Abuelo paterno</th>
            <th style="text-align: center;">Parentesco:Abuela materna</th>
            <th style="text-align: center;">Parentesco:Padre</th>
            <th style="text-align: center;">Parentesco:Madre</th>
            <th style="text-align: center;">Tabaquismo</th>
            <th style="text-align: center;">Drogas</th>
            <th style="text-align: center;">Alcohol</th>
          
        </tr>
          
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              
              <td style="text-align: center;"><?php  echo $row[1]?></td> 
              <td style="text-align: center;"><?php  echo $row[2]?></td> 
              <td style="text-align: center;"><?php  echo $row[3]?></td> 
              <td style="text-align: center;"><?php  echo $row[4]?></td>  
              <td style="text-align: center;"><?php  echo $row[5]?></td>
              <td style="text-align: center;"><?php  echo $row[6]?></td>  
              <td style="text-align: center;"><?php  echo $row[7]?></td>
              <td style="text-align: center;"><?php  echo $row[8]?></td>  
              <td style="text-align: center;"><?php  echo $row[9]?></td>

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