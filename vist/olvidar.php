<?php 

    require("../conexion/connect_db.php");

    $sql="SELECT matricula,correo,contrasenia,nombreAalumno FROM alumno";
  $query=mysqli_query($mysqli,$sql);
 ?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="select2/select2.min.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="select2/select2.min.js"></script>
</head>
<body>
    <div class="col-8">
    <form class="row g-3 needs-validation" method="POST" action="../control/recupera.php" enctype="multipart/form-data" name="enviar"novalidate>

    <section style="text-align: center;">
        <label >selecciona tu nombre</label><br>
        <select id="correo" style="width: 50%" aria-label="correo" name="correo">
            <?php
            require("../conexion/connect_db.php");
            $sql="SELECT matricula,correo,contrasenia, CONCAT_WS(' ',nombreAalumno,apellifoPaterno,ApellidoMaterno) FROM alumno";
            $query=mysqli_query($mysqli,$sql);
             while ($correo=mysqli_fetch_row($query)) {?>

            <option value="<?php echo $correo[2] ?>">
                <?php echo $correo[3] ?>
            </option>

            <?php  }?>
        </select>

        <label ><br>Selecciona tu correo</label><br>
        <select id="controlBuscador" style="width: 50%" aria-label="controlBuscador" name="controlBuscador">
            <?php
            require("../conexion/connect_db.php");
            $sql="SELECT matricula,correo,contrasenia,nombreAalumno FROM alumno";
            $query1=mysqli_query($mysqli,$sql);
             while ($controlBuscador=mysqli_fetch_row($query1)) {?>

            <option value="<?php echo $controlBuscador[1] ?>">
                <?php echo $controlBuscador[1] ?>
            </option>

            <?php  }?>
        </select>
        <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar correo</button>
  </div>
    </section>
    </form>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#controlBuscador').select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#correo').select2();
    });
</script>
