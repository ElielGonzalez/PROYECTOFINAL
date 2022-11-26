
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

  $sql="SELECT matricula,concat_ws(' ',nombreAalumno,apellifoPaterno,ApellidoMaterno),sexo,carrera_alumno,grupo_alumno FROM `alumno` WHERE nutriolgo_cedula = '$val'";
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
</head>
<body>
<p style="text-align: center; font-size: 20px; ">Tabla Alumno</p>
    <table class="table">
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Carrera</th>
            <th>Grupo</th>
        
        </tr>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <td><?php  echo $row[0]?></td>
              <td><?php  echo $row[1]?></td> 
              <td><?php  echo $row[2]?></td> 
              <td><?php  echo $row[3]?></td> 
              <td><?php  echo $row[4]?></td>  
        
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