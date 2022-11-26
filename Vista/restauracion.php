<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombre']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['Rol']!=1) {
    header("Location:../vista/indexAdmin.php");
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


    <title>Servicio social</title>
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
              <a class="nav-link active" style="font-size:24px;color:white;" aria-current="page" href="../vista/indexAdmin.php">Inicio</a>
            </li>

          
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="font-size:24px;color:white;" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrador <?php echo $_SESSION['nombre'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="font-weight-bold text-center">Sistema web de nutrición</h1>
    <h5 class="font-weight-bold mb-4 text-center p-4">Restauración</h5>
    <div class="container">
    <form action="../control/restore.php" method="POST" id="formulario" >
    <p style=" font-size: 28px; ">Selecciona un punto de restauración</p><br><br>
    <select name="restorePoint" class="form-control">
      <option value="" disabled="" selected="" >Selecciona un punto de restauración</option>
      <?php
        require("../conexion/Connet.php");
        $ruta=BACKUP_PATH;
        if(is_dir($ruta)){
            if($aux=opendir($ruta)){
                while(($archivo = readdir($aux)) !== false){
                    if($archivo!="."&&$archivo!=".."){
                        $nombrearchivo=str_replace(".sql", "", $archivo);
                        $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                        $ruta_completa=$ruta.$archivo;
                        if(is_dir($ruta_completa)){
                        }else{
                            echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                        }
                    }
                }
                closedir($aux);
            }
        }else{
            echo $ruta." No es ruta válida";
        }
      ?>
    </select>
        <br>
    <button type="submit" class="btn btn-outline-danger">Restaurar</button>
  </form>
  </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>