<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

  $sql="SELECT h.id_habitosAlimentcios,a.matricula,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),h.p1,h.p2,h.p3,h.p4,h.p5,h.p6 FROM `habitosalimenticios` h INNER JOIN alumno a on h.alumno_matricula =a.matricula";
  $query=mysqli_query($mysqli,$sql);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/pagina.css" />
    <link rel="stylesheet" href="../vista/style/menu.css" />
    <link rel="stylesheet" href="../vista/CSS1/style.css">

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <title>Servicio nutricional</title>
  </head>
  <body class="">
   <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="font-size:19px ;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/indexDocente.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Registro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/historiaClinica.php">Registro de historial m??dico</a></li>
                <li><a class="dropdown-item" href="../vista/registroHabitos1.php">H??bitos alimenticios </a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/tt.html">Gesti??n de alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/cita.php">Citas</a>
            </li>
           
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutri??logo:  <?php echo $_SESSION['nombreNutriologo'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contrase??a</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesi??n</a></li>
          </ul>
        </div>
      </div>
    </nav>
     <h1 class="text-center">Sistema web de nutrici??n</h1>
    <h5 class="text-center">Registro de h??bitos alimenticios</h5>

    <main>
   



    <br>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="content-table1">
        <thead>
            <th style="text-align: center;">Nombre</th>
            <th style="text-align: center">1. ??Cu??ntas veces al d??a comes?l</th>
            <th style="text-align: center">2. ??Cu??l es la comida principal para t???</th>
            <th style="text-align: center">3 ??De qu?? consiste y c??mo preparas/est?? hecha tu comida principal?</th>
            <th style="text-align: center">4. ??Est??s o has estado evitando alguna comida por razones de salud?</th>
            <th style="text-align: center">5. ??Qu?? porcentaje de tu comida habitual forma la carne?</th>
            <th style="text-align: center">6. ??Cu??nto de tu comida habitual forma la verdura y los productos vegetarianos?</th>
           
            <th style="text-align: center">Actualizar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr class="active-row">
              
              
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[6]?></th>
              <th style="text-align: center"><?php  echo $row[7]?></th>
              <th style="text-align: center"><?php  echo $row[8]?></th>
             
              
              <th style="text-align: center"><a href="../vista/editarHabitosAlimenticos.php?id=<?php echo $row[1] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>

              <th style="text-align: center"><a href="../control/elieminarHabitoAlimenticio.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
  </main>
  <script type="text/javascript">
    function confirmarActualizaAlu(){
            var respuesta = confirm("??Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }  

        function confirmarEliminarAlu(){
            var respuesta = confirm("??Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>