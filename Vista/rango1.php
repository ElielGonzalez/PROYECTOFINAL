
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generar reporte comida</title>
</head>
<body>
	<div class="container" >    
    <form method="post" action="../vista/ReporteAlimentos.php" class="formulario p-3 mb-2">
        <div class="row">    
            <label for="RangoFech" class="formulario__label">Seleccione rango de fechas o programa educativo:</label>
            <div class="col-lg-5">
                 <select class="formulario__input" id="idPrograma" name="idPrograma">
                        <?php
                        require("../conexion/connect_db.php");
                        $getUnidad = "SELECT DISTINCT grupo from gestionalimentos";
                        $getUnidad1 = mysqli_query($mysqli,$getUnidad);

                        while ($row = mysqli_fetch_array($getUnidad1)) {
                         echo '<option value="'.$row['grupo'].'">'.$row['grupo'].'</option>';
                        }
                      ?>
                    </select>





            </div>
            <div class="col-lg-4">
                <button type="submit" name="generar_reporte" class="btn btn-success z-depth-2">Generar reporte </button>
            </div>
        </div>    
    </form>
    </div>

</body>
</html>