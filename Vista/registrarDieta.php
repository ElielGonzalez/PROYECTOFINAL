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
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/pagina.css" />
    <link rel="stylesheet" href="../vista/style/menu.css" />
    <link rel="stylesheet" href="../vista/CSS1/style.css">


    <title>web nutricional</title>
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
    <h5 class="text-dark text-center">Consulta de dieta</h5>

    <main>
    <!-- Inicia la tabla lunes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Lunes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Lunes</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id dieta</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->


    <!-- Inicia la tabla Martes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Martes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Martes</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax2" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              
             <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Miercoles-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Miercoles' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Miercoles</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax3" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

     <!-- Inicia la tabla Jueves-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Jueves' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Jueves</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax4" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th>  
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Viernes-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Viernes' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Viernes</p>
   <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax5" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
             <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->

    <!-- Inicia la tabla Sabado-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Sabado' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Sabado</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax6" class="content-table">
        <thead class="table-dark table-borderless">
             <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th> 
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
    <!-- Inicia la tabla Domingo-->
    <?php

  $primer=$_GET['id'];
  $sql="SELECT d.id_dieta,d.dia,concat_ws(' ',g.nombreAlimento,p.tipoComida) FROM alumno a INNER JOIN plannutricional p on a.matricula = p.alumno_matricula INNER JOIN gestionalimentos g ON p.gestionAlimentos_idGesAlimento= g.idGesAlimento INNER JOIN dieta d on p.id_planAlimenticio= d.id_planAlimenticio WHERE d.dia='Domingo' AND a.matricula='$primer'";
  $query=mysqli_query($mysqli,$sql);
  
    ?>
    <br>
    <p style="text-align: center; font-size: 20px; ">Domingo</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax7" class="content-table">
        <thead class="table-dark table-borderless">
            <th style="text-align: center;">Id plan</th>
            <th style="text-align: center">Día</th>
            <th style="text-align: center">Comida y tipo</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr>
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th> 
              <th style="text-align: center"><?php  echo $row[2]?></th>
              
              <th style="text-align: center"><a href="../vista/editarDieta.php?id=<?php echo $row[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Ediitar</a></th>
              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row[0] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>
    <!-- fin tabla media maniana-->
  </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
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
  <script>
      $(document).ready(function () {
            $('#tablax6').DataTable({
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
            $('#tablax7').DataTable({
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
  </body>
</html>