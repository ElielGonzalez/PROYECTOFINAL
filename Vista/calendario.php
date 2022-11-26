<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>calendario eventos</title>
    <!-- scrip css-->
<link rel="stylesheet" href="../vista/CSS1/bootstrap.min.css">
<link rel="stylesheet" href="../vista/CSS1/datatables.min.css">
<link rel="stylesheet" href="../vista/CSS1/bootstrap-clockpicker.css">
<link rel="stylesheet" href="../vista/fullcalendar/main.css">


<!-- scrip js-->
<script src="../vista/js1/jquery-3.6.1.min.js"></script>
<script src="../vista/js1/popper.min.js"></script>
<script src="../vista/js1/bootstrap.min.js"></script>
<script src="../vista/js1/datatables.min.js"></script>
<script src="../vista/js1/bootstrap-clockpicker.js"></script>
<script src="../vista/fullcalendar/main.js"></script>
</head>
<body>
  <div id="Calendario1" style="border: 1px solid #000; padding: 2px"></div>   
            
  

   
     



   <script >
    //$('.clockpicker').clockpicker();
       let calendario1 = new FullCalendar.Calendar(document.getElementById('Calendario1'),{
        locale: 'es',
        headerToolbar:{
            left:'prev,next today',
            center:'title',
            right:'dayGridMonth,timeGridWeek,timeGridDay'
        },

        events: 'datoseventos.php?accion=listar'
    
       });

       calendario1.render();

       </script>

</body>
</html>