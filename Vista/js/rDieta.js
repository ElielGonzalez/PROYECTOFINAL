var boton=document.getElementById('agregar');
var guardar=document.getElementById('guardar');
var lista=document.getElementById("lista");
var data=[];
boton.addEventListener("click",agregar);
guardar.addEventListener("click",save);
var cant=0;
function agregar(){
    var nombre=document.querySelector('#nombre').value;
    var nombreAlimento=document.querySelector('#nombreAlimento').value;
    //agrega elementos al arreglo
    data.push(
        {"id":cant,"nombre":nombre,"nombreAlimento":nombreAlimento}
    );
   
   //convertir el arreglo a json
  // console.log(JSON.stringify(data));
  var id_row='row'+cant;
  var fila='<tr id='+id_row+'><td>'+nombre+'</td><td>'+nombreAlimento+'</td><td><a href="#" class="btn btn-danger" onclick="eliminar('+cant+')";>Eliminar</a><a href="#" class="btn btn-danger" onclick="cantidad('+cant+')";>Cantidad</a></td></tr>';
  //agregar fila a la tabla
  $("#lista").append(fila);
  //$("#nombre").val('');
  //$("#nombreAlimento").val('');
  //$("#grupo").val('');
  //$("#nombre").focus();
  cant++;
}
function eliminar(row){
    //remueve la fila de la tabla html
    $("#row"+row).remove();
   //remover el elmento del arreglo
   //data.splice(row,1);
   //buscar el id a eliminar
   var i=0;
   var pos=-1;
   for (x of data){
       console.log(x.id);
       if (x.id==row){
           pos=i;
       }
       i++;
   }
   data.splice(pos,1);
}

function save(){
    var json=JSON.stringify(data);
    $.ajax({
        type: "POST",
        url: "../control/api3.php",
        data: "json="+json,
        success:function(respo){
           location.reload();
        }
        
    });
}