
<?php

  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['nombreAalumno']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=3) {
    header("Location:../vista/indexAlumno.php");
  }


$val = $_SESSION['matricula'];


//$resultAll = mysqli_query($mysqli,"SELECT imagen From historiaclinica WHERE alumno_matricula ='$val' ");  
  //$rowData = mysqli_fetch_array($resultAll);

  $sql="SELECT * FROM img WHERE alumno='$val'";
  $query=mysqli_query($mysqli,$sql);




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Galeria</title>
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300_600&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../vista/css/galeria.css">
</head>
<body>
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

	<h1>Galeria de fotos</h1>
	 <?php while($row=mysqli_fetch_array($query)){ ?>
	<div class="Galeria">
		<div class="foto">
			<img src="../control/<?php echo $row['imagen']; ?>" alt="imagen">
		</div>
		<div class="pie">
			<h3>Fecha de registro</h3>
			<p><?php  echo $row['fecha']?></p>
			<h3>Metas</h3>
			<p><?php  echo $row['descripcion']?></p>
		</div>
	</div>
	 <?php } ?>
	 <br>
	 <br>
	

</body>
</html>