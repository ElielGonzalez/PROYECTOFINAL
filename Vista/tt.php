<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }


  $sql="SELECT g.idGesAlimento,g.nombreAlimento,g.kcal,g.grasa,g.hCarbono,g.proteina FROM gestionalimentos g ORDER BY idGesAlimento DESC";
  $query=mysqli_query($mysqli,$sql);
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
                <li><a class="dropdown-item" href="../vista/historiaClinica.php">Registro de historial médico</a></li>
                <li><a class="dropdown-item" href="../vista/registroHabitos1.php">Hábitos alimenticios </a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/tt.html">Gestión de alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../vista/cita.php">Citas</a>
            </li>
           
          </ul>
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutriólogo:  <?php echo $_SESSION['nombreNutriologo'] ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../vista/modificarContraAd.php">Cambiar contraseña</a></li>
                <li><a class="dropdown-item" href="../control/destroyer.php">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!---------fin nav-->
    <form class="">
        <div class="row">
            <div class="col-3">
        <label>Porción</label>
         <select class="form-control" id="nombre">
                        <option value="unidades" selected>unidades</option>            
                        <option value="gramos">gramos</option>
                        <option value="tazas">tazas</option>
                        <option value="mililitros ">mililitros </option>
                        <option value="porciones">porciones</option>
        </select>


        <label>Nombre del alimento</label>
        <input type="text" class="form-control" id="nombreAlimento">
        <label>Grupo de alimentos</label>
        <select  class="form-control" id="grupo">
                        <option value="verduras y frutas" selected>verduras y frutas</option>      
                        <option value="cereales y tubérculos">cereales y tubérculos</option>
                        <option value="leguminosas y alimentos de origen animal">leguminosas y alimentos de origen animal</option>
        </select> 
         <h3>Información nutricional de los Alimentos-></h3>
    </div>
    <div class="col-2">
     
        <label>calorías en kcal</label>
        <input type="text" class="form-control" id="kcal">
        <label>Grasas en gr </label>
        <input type="text" class="form-control" id="grasa">
        <label>Carbohidratos gr</label>
        <input type="text" class="form-control" id="hCarbono">
        <label>Proteína en gr</label>
        <input type="text" class="form-control" id="proteina">
    
        <input type="button" value="Agregar" class="btn btn-success mt-3" id="agregar">
        <input type="button" value="Guardar" class="btn btn-success mt-3" id="guardar">
        </div>
    <div class="container col-md-7" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">kcal</th>
            <th style="text-align: center">grsa</th>
            <th style="text-align: center">HCarbono</th>
            <th style="text-align: center">Proteina</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th> 
              <th style="text-align: center"><?php  echo $row[4]?></th>
              <th style="text-align: center"><?php  echo $row[5]?></th> 


            <?php } ?>
            </tbody>
    </table>
    </div>
        </div>
    </div>
    </form>
    <div class="col-12" id="productos" >
        <table class="table table-striped" id="lista">
            <tr>
                <td>Porción</td>
                <td>Nombre</td>
                <td>Editar</td>
                <td>Grupo</td>
                <td>Kilocalorías</td>
                <td>Editar</td> 
                <td>Grasa</td>
                <td>Editar</td>
                <td>H Carbono</td> 
                <td>Editar</td>
                <td>Proteína</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </table>
    </div>
    <div class="col-10 text-right" id="total"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../vista/js/tt.js"></script>




     <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>

    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _END_ al _START_  de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 250,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>

  </body>


 
</html>