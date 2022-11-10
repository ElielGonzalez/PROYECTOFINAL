
<?php
header('Content-Type:application/json');
$pdo = new PDO("mysql:dbname=nutricion;host=localhost","root","");
$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {
    case 'agregar':
        // code...
   // echo "Instruccion agregar";
        $sentenciaSQL = $pdo->prepare("INSERT INTO eventos (title, descripcion, color,textcolor,start,end) VALUES (:title,:descripcion,:color,:textColor,:start,:end)");
        
        $respuesta =$sentenciaSQL->execute(array(
            "title" =>$_POST['title'],
            "descripcion"=>$_POST['descripcion'],
            "color"=>$_POST['color'],
            "textcolor"=>$_POST['textColor'],
            "start"=>$_POST['start'],
            "end"=>$_POST['end']

        ));
        break;
    case 'eliminar':
        // code...
    echo "Instruccion eliminar";
        break;
    case 'modificar':
        // code...
        echo "Instruccion modificar";
        break;
    
    default:
        // code...

        $sentenciaSQL= $pdo->prepare("select * from eventos");
        $sentenciaSQL->execute();

        $resultado =$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);

        break;
}


  
?>
