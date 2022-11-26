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

 $sqlt="SELECT e.id,e.title,e.descripcion,e.start,e.end,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno),concat_ws(' ',n.nombreNutriologo,n.apellidoPatermo,n.ApellidoMateno) FROM eventos e INNER JOIN alumno a ON e.matricula_alumno= a.matricula INNER JOIN nutriolgo n on e.cedula_nutriologo=n.cedula WHERE cedula_nutriologo ='$val'";
  $queryt=mysqli_query($mysqli,$sqlt);



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
    
    <link rel="stylesheet" href="../vista/style/estilosCitas.css" />
     <!--<link rel="stylesheet" href="../vista/CSS1/style.css">-->


    <title>Registrar cita</title>
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
              <a class="nav-link active" aria-current="page" href="../vista/citasCalendario.html">Ver cita en calendario</a>
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
    <h1 class="text-center">Sistema web de nutrición</h1>
    <h5 class="text-center" >Registro de citas</h5>

    <main >
    <form class="formularior" id="formulario" method="post" action="../control/agregarCita.php">
      <div class="row">
        <div class="col-1"></div>
      <div class="col-3">
      <!-- Grupo: Nombre TITULO  -->
      <div >
        <label for="titulo" class="formulario__label">Título de la cita</label>
        <div>
          <input type="text" class="formulario__input" name="titulo" id="titulo" placeholder="EJ: Cita con Sadra">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>

       <!-- Grupo: Nombre descripcion  -->
      <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="EJ: Cita con Sadra">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>





 <!-- Grupo: Nombre descripcion  -->
      <div class="formulario__grupo" id="grupo__descripcion">
        <label for="descripcion" class="formulario__label">Color de evento</label>
        <div class="formulario__grupo-input">
          <input class="formulario__input" type="color" value="#ff0000" id="txtColor" name="txtColor" style="height: 30px;">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">El nombre tiene que ser de 4 a 20 dígitos y solo puede contener numeros, letras y guion bajo.</p>
      </div>





    </div>
    <div class="col-3">
      <!-- Grupo: inicio -->
      <div class="formulario__grupo" id="grupo__inicio">
         <label for="inicio" class="formulario__label">Fecha y hora de inicio:</label>
         <div class="formulario__grupo-input">
          <input type="datetime-local" class="formulario__input" id="inicio" name="inicio">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
      </div>
      <!-- Grupo: fin -->
      <div class="formulario__grupo" id="grupo__fin">
         <label for="fin" class="formulario__label">Fecha y hora de inicio:</label>
         <div class="formulario__grupo-input">
          <input type="datetime-local" class="formulario__input" id="fin" name="fin">
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-3">


    <!-- Grupo: datos del alumno -->
      <div class="formulario_grupo" id="grupo_alumno_matricula ">
        <label for="alumno_matricula " class="formulario__label">Nombre del alumno</label>
        <div class="formulario__grupo-input">
                    <select name="alumno_matricula" class="formulario__input" id="alumno_matricula">
                       <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT a.matricula,concat_ws(' ',a.nombreAalumno,a.apellifoPaterno,a.ApellidoMaterno) FROM `alumno` a WHERE nutriolgo_cedula='$val'";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row22 = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row22[0].'">'.$row22[1].'</option>';
                        }
                      ?>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>



     <!-- Grupo: nutriolgo_cedula -->
      <div class="formulario_grupo" id="grupo_nutriolgo_cedula">
        <label for="nutriolgo_cedula" class="formulario__label">Nombre del nutriólogo</label>
        <div class="formulario__grupo-input">
                    <select name="nutriolgo_cedula" class="formulario__input" id="nutriolgo_cedula">
                        <?php
                        require("../conexion/connect_db.php");
                        $getUnidad34 = "SELECT * from nutriolgo WHERE cedula= '$val'";
                        $getUnidad11 = mysqli_query($mysqli,$getUnidad34);

                        while ($row23 = mysqli_fetch_array($getUnidad11)) {
                         echo '<option value="'.$row23[0].'">'.$row23[1].'</option>';
                        }
                      ?>
                    </select> 
          <i class="formulario__validacion-estado fas fa-times-circle"></i>
        </div>
        <p class="formulario__input-error">Selecciona</p>
      </div>
    </div>

      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
      </div>

      <div class="formulario__grupo formulario__grupo-btn-enviar">
        <button type="submit" class="formulario__btn">Registrar cita</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
      </div>

    
    </form>



    <br>
    <p style="text-align: center; font-size: 20px; ">Citas registradas</p>
    <div class="col-12">
    <table class="table table-bordered">
            <th style="text-align: center">Id</th>
            <th style="text-align: center">Título de la cita</th>
            <th style="text-align: center">Descripción</th>
            <th style="text-align: center">Fecha y hora inicio</th>
            <th style="text-align: center">Fecha y hora fin </th>
            <th style="text-align: center">Alumno </th>
            <th style="text-align: center">Nutriólogo </th>
            <th style="text-align: center">Editar</th>
            <th style="text-align: center">Eliminar</th>
            <th style="text-align: center">Enviar correo</th>
        
        
            <?php while($rowt=mysqli_fetch_array($queryt)){ ?>
            <tr class="active-row">
              <th style="text-align: center"><?php  echo $rowt[0]?></th>
              <th style="text-align: center"><?php  echo $rowt[1]?></th>
              <th style="text-align: center"><?php  echo $rowt[2]?></th>
              <th style="text-align: center"><?php  echo $rowt[3]?></th>
              <th style="text-align: center"><?php  echo $rowt[4]?></th>
              <th style="text-align: center"><?php  echo $rowt[5]?></th>
              <th style="text-align: center"><?php  echo $rowt[6]?></th>   

              <th style="text-align: center"><a href="../vista/editarCitaCalendario.php?id=<?php echo $rowt[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Editar</a></th>

              <th style="text-align: center"><a href="../control/eliminarAlumno.php?id=<?php echo $rowt[6] ?>" class="btn btn-outline-danger" onclick="return confirmarEliminarAlu()">Eliminar</a></th>

              
              <th style="text-align: center"><a href="../vista/RegistrarCita.php?id=<?php echo $rowt[0] ?>" class="btn btn-outline-primary" onclick="return confirmarActualizaAlu()">Correo</a></th>


            </tr>

            </tr>
            <?php } ?>
            
    </table>
  </div>

  </main>


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