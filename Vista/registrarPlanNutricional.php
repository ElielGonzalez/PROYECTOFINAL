<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }




  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT idGesAlimento,concat_ws(' ',nombreAlimento,kcal, grasa,hCarbono,proteina),tipoComida,p.alumno_matricula from gestionalimentos INNER JOIN plannutricional p on gestionAlimentos_idGesAlimento = gestionalimentos.idGesAlimento WHERE id_planAlimenticio ='$id'";
    $query99=mysqli_query($mysqli,$sql);
    $row99=mysqli_fetch_array($query99);
  }

?>
<html lang="en">
  <head>
     <style>
      th,td {
            padding: 0.4rem !important;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
   <h1 class="text-dark text-center">Sistema web de nutrición</h1>
    <h5 class="text-dark text-center">Consulta y edición del plan nutricional</h5>

    <main>
  

    <!-- Inicia la tabla Desayuno -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento,id_planAlimenticio from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Desayuno' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Desayuno</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">M.alumno</th>
            <th style="text-align: center">Nombre Alimento</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/123.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
  
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>


            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento,id_planAlimenticio from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Media mañana' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Media mañana</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax2" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">M.alumno</th>
            <th style="text-align: center">Nombre Alimento</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/123.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
  
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>


            <?php } ?>
            </tbody>
    </table>
    </div>



    <!-- Inicia la tabla media maniana -->
    
    <!-- fin tabla media maniana-->


    <!-- Inicia la tabla Comida -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento,id_planAlimenticio from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Comida' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Comida</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax3" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">M.alumno</th>
            <th style="text-align: center">Nombre Alimento</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/123.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
  
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla comida-->


    <!-- Inicia la tabla Merienda -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento,id_planAlimenticio from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Merienda' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Merienda</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax4" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">M.alumno</th>
            <th style="text-align: center">Nombre Alimento</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>  
              <th style="text-align: center"><a href="../vista/123.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
  
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    

    <!-- Inicia la tabla cena -->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT p.id_planAlimenticio,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),p.tipoComida,p.alumno_matricula, g.nombreAlimento,id_planAlimenticio from alumno a INNER JOIN plannutricional p on p.alumno_matricula = a.matricula INNER JOIN gestionalimentos g on p.gestionAlimentos_idGesAlimento = g.idGesAlimento WHERE p.tipoComida='Cena' AND a.matricula= '$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Cena</p>
     <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax5" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Tipo comida</th>
            <th style="text-align: center">M.alumno</th>
            <th style="text-align: center">Nombre Alimento</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[5]?></th>
              <th style="text-align: center"><?php  echo $row[2]?></th>
              <th style="text-align: center"><?php  echo $row[3]?></th>
              <th style="text-align: center"><?php  echo $row[4]?></th>
              <th style="text-align: center"><a href="../vista/123.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>  
  
              <th style="text-align: center"><a href="../control/eliminarPlanAlimenticios.php?id=<?php echo $row['id_planAlimenticio'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
               
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->






<!--nuevo modal reporte de dieta por alumno-->
<div class="modal fade" id="Ejempo4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte de dieta por alumno.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../vista/reporteDeDietas.php" class="formulario p-3 mb-2">
          <div class="form-group">
                   <label >Tipo comida</label>
          <select  class="form-control" id="tipoComida">
                        <option value="<?php echo $row99[2]  ?>" selected><?php echo $row99[2]  ?></option>
                        <option value="Desayuno" selected>Desayuno</option>          
                        <option value="Media mañana">Media mañana</option>
                        <option value="Comida">Comida</option>
                        <option value="Merienda">Merienda</option>
                        <option value="Cena">Cena</option>
                    </select> 


        
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

      </div>
     
    </div>
  </div>
</div>




     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </main>
  <script type="text/javascript">

        function confirmarEliminarAlu(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
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
                scrollY: 300,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>
    <script>
$(document).ready(function () {
            $('#tablax2').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
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
                scrollY: 300,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>


    <script>
$(document).ready(function () {
            $('#tablax3').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
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
                scrollY: 300,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>

    <script>
$(document).ready(function () {
            $('#tablax4').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
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
                scrollY: 300,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>

    <script>
$(document).ready(function () {
            $('#tablax5').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
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
                scrollY: 300,
                lengthMenu: [ [5, 10, -1], [5, 10, "All"] ],
            });
        });
    </script>
      <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
       function confirmarEliminarAlu(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>

  </body>
</html>