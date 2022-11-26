<!doctype html>
<?php
  require("../conexion/connect_db.php");
  session_start();
  if (@!$_SESSION['cedula']) {
    header("Location:../vista/Login.php");
  }elseif ($_SESSION['rol']!=2) {
    header("Location:../vista/indexDocente.php");
  }

  $sql="SELECT * FROM eventos";
  $query=mysqli_query($mysqli,$sql);


  $resultado= $query->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultado);

  
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/style/pagina.css" />
    <link rel="stylesheet" href="../vista/style/menu.css" />

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Index Profesor</title>
  </head>
  <body >

    <div class="contenedor">

        <header class="header"> <h1 class="font-weight-bold mb-4 p-3 text-center">Sistema web plan nutricional</h1></header>
        <aside class="asidebar">
            
            <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/dashboard.svg" class="list__img">
                    <a href="../vista/indexDocente.php" class="nav__link">Inicio</a>
                </div>
            </li>

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
                        <a href="../vista/historiaClinica.php" class="nav__link nav__link--inside">Historia medico clinico</a>
                    </li>

                    <li class="list__inside">
                        <a href="../vista/registroHabitos1.php" class="nav__link nav__link--inside">Habitos aliementicios</a>
                    </li>
                    
                </ul>

            </li>


            

             <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/stats.svg" class="list__img">

                    <a href="../vista/resgitroAlimento.php" class="nav__link">Gestion alimentos</a>
                </div>
            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/stats.svg" class="list__img">
                    <a href="../vista/calendario.php" class="nav__link">Calendario</a>
                </div>
            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="../vista/imagenes/message.svg" class="list__img">
                    <a href="../vista/correo.php" class="nav__link">Enviar correo</a>
                </div>
            </li>


            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../vista/imagenes/bell.svg" class="list__img">
                    <a href="#" class="nav__link">Citas</a>
                    <img src="../vista/imagenes/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Estoy dentro</a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Estoy dentro</a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Estoy dentro</a>
                    </li>
                </ul>

            </li>


            

        </ul>
    </nav>
        </aside>

        <!-- a qui va en contenedor Main -->
        <main class="datos">
       
    


    

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