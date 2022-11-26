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

  $sql="SELECT matricula,concat_ws(' ',nombreAalumno,apellifoPaterno,ApellidoMaterno) FROM `alumno` WHERE nutriolgo_cedula = '$val'";
  $query=mysqli_query($mysqli,$sql);

  
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
    <title>Página nutriólogo</title>
  </head>
  <body >

    <div class="contenedor">

        <header class="header text-white bg-primary"> <h1 class="font-weight-bold mb-4 p-3 text-center">Sistema web de nutrición</h1></header>
        <aside class="asidebar">
            
            <nav class="nav">
        <ul class="list">

           <h3 class="p-3 mb-2 bg-dark text-white">Menú: Nutriólogo</h3><br><br>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Registro</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../vista/registroAlumno.php" class="nav__link nav__link--inside">Alumno</a>
                    </li>

                    <li class="list__inside">
                        <a href="../vista/historiaClinica.php" class="nav__link nav__link--inside">Historial médico clínico</a>
                    </li>

                    <li class="list__inside">
                        <a href="../vista/registroHabitos1.php" class="nav__link nav__link--inside">Hábitos alimenticios</a>
                    </li>

                    
                </ul>

            </li>
            

             <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/5.svg" class="list__img">

                    <a href="../vista/tt.php" class="nav__link">Gestión de alimentos</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/3.svg" class="list__img">
                    <a href="../vista/Cita.php" class="nav__link">Citas</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/3.svg" class="list__img">
                    <a href="../vista/RegistroIMG.php" class="nav__link">Imagenes</a>
                </div>
            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/2.svg" class="list__img">
                    <a href="../vista/citasCalendario.html" class="nav__link">Calendario</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/321.svg" class="list__img">
                    <a href="#" class="nav__link">Reportes</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">

                    <li class="list__inside">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo1" data-whatever="@mdo">Citas</button>
                    </li>
                    <li class="list__inside">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo2" data-whatever="@mdo">Alumnos</button>
                    </li>
                    <li class="list__inside">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo3" data-whatever="@mdo">Historia clínica</button>
                    </li>
                    <li class="list__inside">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ejempo4" data-whatever="@mdo">Dieta</button>
                    </li>
                </ul>



            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/4.svg" class="list__img">
                    <a href="#" class="nav__link">Opciones</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Cambiar contraseña</a>
                    </li>

                    <li class="list__inside">
                        <a href="../control/destroyer.php" class="nav__link nav__link--inside">Cerra sesión </a>
                    </li>
                </ul>


            

        </ul>
    </nav>
        </aside>

        <!-- a qui va en contenedor Main -->
        <main class="datos">
       
    


    <br>
    <p style="text-align: center; font-size: 20px; ">Pacientes registrados</p>
    <div class="container" style="margin-top: 5px;padding: 5px">
    <table id="tablax" class="content-table">
        <thead>
            <th style="text-align: center;">Matricula</th>
            <th style="text-align: center">Nombre</th>
            <th style="text-align: center">Plan</th>
            <th style="text-align: center">Dieta</th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <tr class="active-row">
              <th style="text-align: center"><?php  echo $row[0]?></th>
              <th style="text-align: center"><?php  echo $row[1]?></th>  

            <!---nuevo nav-->
            <th>
                <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/44.svg" class="list__img">
                    <a href="#" class="nav__link">Plan</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a class="nav__link nav__link--inside btn outline-danger"href="../vista/registroplaaan.php?id=<?php echo $row['matricula'] ?>" onclick="return confirmarPlan()">Registrar Plan</a>
                    </li>

                    <li class="list__inside">
                        <a href="../vista/registrarPlanNutricional.php?id=<?php echo $row['matricula'] ?>" onclick="return confirmarPlan()" >Consultar plan</a>
                    </li>

                    
                </ul>

            </li>
            </th>

            <!---nuevo nav-->
            <th>
                <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Dieta</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a class="nav__link nav__link--inside" href="../vista/rDieta.php?id=<?php echo $row['matricula'] ?>" onclick="return confirmarDieta()">Registrar dieta</a>
                    </li>

                    <li class="list__inside">
                        <a class="nav__link nav__link--inside" href="../vista/registrarDieta.php?id=<?php echo $row['matricula'] ?>" onclick="return confirmarPlan()">Consultar dieta</a>
                    </li>

                    
                </ul>

            </li>
            </th>

              <th style="text-align: center"><a href="../vista/editarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>

              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $row['matricula'] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>
            </tr>
            <?php } ?>
            </tbody>
    </table>
    </div>

    <!--nuevo modal-->
<div class="modal fade" id="Ejempo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar reporte de citas por rango de fechas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="../vista/ReporteAlimentos.php" class="formulario p-3 mb-2">
          <div class="form-group">
             <label for="RangoFech" class="formulario__label">Fecha inicio</label>
                 <input type="datetime-local" class="formulario__input" id="fecha1" name="fecha1">
                 <br>
                 <label for="RangoFech" class="formulario__label">Fecha final</label>
                 <input type="datetime-local" class="formulario__input" id="fecha2" name="fecha2">
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



<!--nuevo modal reporte de alumnos-->
<div class="modal fade" id="Ejempo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar reporte de alumnos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../vista/reporteAlumnoGenero.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="sexo" class="formulario__label">Sexo:</label>
                    <select name="sexo" class="form-control" id="sexo">
                        <option value="Hombre" selected>Hombre</option>            
                        <option value="Mujer">Mujer</option>
                    </select> 
            
          </div>
          <div class="modal-footer">
            
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

        <form method="post" action="../vista/reporteAlumnoCarrera.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="carreraAlumno" class="formulario__label">Carrera:</label>
                    <select name="carreraAlumno" class="form-control" id="carreraAlumno">
                        <option value="ITI" selected>ITI</option>            
                        <option value="ITA">ITA</option>
                        <option value="IFI">IFI</option>
                        <option value="IET">IET</option>
                        <option value="IIN">IIN</option>
                        <option value="ITA">ITA</option>
                        <option value="IBT">IBT</option>
                        <option value="LAG">LAG</option>
                    </select> 
            
          </div>
          <div class="modal-footer">
           
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

        <form method="post" action="../vista/reporteAlumnoCuatrimestre.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label>Cuatrimestre:</label>
                    <select name="cuatrimestre" class="form-control" id="cuatrimestre">
                        <option value="1" >1 cuatrimestre</option>            
                        <option value="2">2 cuatrimestre</option>
                        <option value="3">3 cuatrimestre</option>            
                        <option value="4">4 cuatrimestre</option>
                        <option value="5">5 cuatrimestre</option>
                        <option value="6">6 cuatrimestre</option>            
                        <option value="7">7 cuatrimestre</option>
                        <option value="8">8 cuatrimestre</option>            
                        <option value="9">9 cuatrimestre</option>
                        <option value="10">10 cuatrimestre</option>
                        <option value="11">11 cuatrimestre</option>
                        <option value="12">12 cuatrimestre</option>            
                        <option value="13">13 cuatrimestre</option>
                        <option value="14">14 cuatrimestre</option>            
                        <option value="15">15 cuatrimestre</option>            
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

<!--nuevo modal reporte de historia clinica-->
<div class="modal fade" id="Ejempo3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte de historial médico clínico.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="../vista/reporteEnfermedadActual.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="Enfermedad" class="formulario__label">Alumnos que padecen alguna enfermedad:</label>
                    <select name="Enfermedad" class="form-control" id="Enfermedad">
                        <option value="Diabetes" selected>Ninguna</option> 
                        <option value="Diabetes" selected>Diabetes</option>          
                        <option value="Obesidad">Obesidad</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Cáncer">Cáncer </option>
                        <option value="Otro">Otro</option>
                    </select> 
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

        <form method="post" action="../vista/reporteEnfermedad1.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="Enfermedad" class="formulario__label">Alumnos que si y no fuman:</label>
                    <select name="Enfermedad" class="form-control" id="Enfermedad">
                         <option value="Si">Alumnos que fuman</option>
                        <option value="No">Alumnos que no fuman</option>
                    </select> 
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>

       <form method="post" action="../vista/reporteEnfermedad2.php" class="formulario p-3 mb-2">
          <div class="form-group">
            <label for="Enfermedad" class="formulario__label">Alumnos que si y no ingieren alcohol  :</label>
                    <select name="Enfermedad" class="form-control" id="Enfermedad">
                         <option value="Si">si ingieren alcohol</option>
                        <option value="No">no ingieren alcohol</option>
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
            <label for="matricula" class="form-control">Nombre del alumno</label>
                    <select name="matricula" class="form-control" id="matricula">
                       <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT matricula,concat_ws(' ',nombreAalumno,apellifoPaterno,ApellidoMaterno) FROM alumno WHERE nutriolgo_cedula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row5 = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row5['matricula'].'">'.$row5[1].'</option>';
                        }
                      ?>
                    </select> 


        
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
          </div>
          
        </form>




        <form method="post" action="../vista/reportedietaPorFecha.php" class="formulario p-3 mb-2">
          <div class="form-group">
             <label for="RangoFech" class="formulario__label">Fecha inicio</label>
                 <input type="datetime-local" class="formulario__input" id="fecha1" name="fecha1">
                 <br>
                 <label for="RangoFech" class="formulario__label">Fecha final</label>
                 <input type="datetime-local" class="formulario__input" id="fecha2" name="fecha2">

                  <label for="matricula" class="form-control">Nombre del alumno</label>
                    <select name="matricula" class="form-control" id="matricula">
                       <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT matricula,concat_ws(' ',nombreAalumno,apellifoPaterno,ApellidoMaterno) FROM alumno WHERE nutriolgo_cedula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row5 = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row5['matricula'].'">'.$row5[1].'</option>';
                        }
                      ?>
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
        function confirmarPlan(){
            var respuesta = confirm("¿Confirmar generar plan nutrcional?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
        
        function confirmarDieta(){
            var respuesta = confirm("¿Confirmar generar Generar dieta?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }

   
        function confirmarActualizaAlu(){
            var respuesta = confirm("¿Confirma actualizar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }   


        function confirmarEliminarAlu(){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>

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
                scrollY: 400,
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../vista/js/nav.js"></script>
  </body>
  </div>
    <footer class="footer">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="<?php echo $rowData['foto']; ?>" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Dirección: Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550</p>
                <p>Tel: (777) 229-3517 </p>        
                <p>Email: informes@upemor.edu.mx</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>UPEMOR</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>

</html>