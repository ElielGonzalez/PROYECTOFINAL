
<!doctype html>
<?php

  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAalumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }


$val = $_SESSION['matricula'];
$Tipo = $_POST['Tipo'];

   $sql="SELECT g.nombreAlimento,g.grupo,concat_ws(' ',g.kcal,'kcal'),concat_ws(' ',g.grasa,'gramos'),concat_ws(' ',g.hCarbono,'gramos'),concat_ws(' ',g.proteina,'gramos') FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE p.tipoComida='$Tipo' AND a.matricula='$val'";
  $query=mysqli_query($mysqli,$sql);
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
<p style="text-align: center; font-size: 20px; "><?php  echo "Reporte de ".$Tipo."."?></p>
    <table   class="table" id="customers">
        <tr>
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th>
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">Alimento</th>
            <th style="text-align: center">Tipo de comida</th> 
        </tr>
          
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td style="text-align: center"><?php  echo $row[0]?></td>
              <td style="text-align: center"><?php  echo $row[1]?></td> 
              <td style="text-align: center"><?php  echo $row[2]?></td> 
              <td style="text-align: center"><?php  echo $row[3]?></td>
              <td style="text-align: center"><?php  echo $row[4]?></td> 
              <td style="text-align: center"><?php  echo $row[5]?></td> 
              >
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