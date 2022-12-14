<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">




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
     <style>
         .borrada{
             background-color: red;
         }
         #productos{
             height: 50vh;
             overflow-y: scroll;
         }
        #total{
            font-weight: bold;
            font-size: 15px;
        }
     </style>
    <title>Registro Alimentos</title>
  </head>
  <body>
    <!--inicio nav-->
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
   <h1 class="text-dark text-center">Sistema web de nutrici??n</h1>
    <h5 class="text-dark text-center">Registro de dieta</h5>
    <!---------fin nav-->
    <form class="col-6">



         <!-- Grupo: Grupo alimenticio  -->
        <label>D??a de la semana</label>
          <select class="form-control" id="nombre">
                        <option value="Lunes">Lunes</option>         
                        <option value="Martes">Martes</option>
                        <option value="Miercoles">Miercoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sabado">Sabado</option>
                        <option value="Domingo">Domingo</option>
                    </select> 




          <!-- Grupo: topi de comida con usuario -->
 
        <label>Tipo de comida y nombre del alimento</label>
                    <select class="form-control" id="nombreAlimento">
                        <?php
                        require("../conexion/connect_db.php");
                        $primer=$_GET['id'];
                        $getUnidad = "SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,p.tipoComida,g.nombreAlimento) from alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE a.matricula= '$primer'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row['id_planAlimenticio'].'">'.$row[1].'</option>';
                        }
                      ?>
                    </select> 


        <input type="button" value="Agregar" class="btn btn-success mt-3" id="agregar">
        <input type="button" value="Guardar" class="btn btn-success mt-3" id="guardar">
      
    </form>
    <div class="col-12" id="productos" >
        <table class="table table-striped" id="lista">
            <tr>
                <td>D??a de la semana</td>
                <td>Matricula alumno</td>
                <td>Acciones</td>
            </tr>
        </table>
    </div>
    <div class="col-10 text-right" id="total"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../vista/js/rDieta.js"></script>

  </body>
</html>