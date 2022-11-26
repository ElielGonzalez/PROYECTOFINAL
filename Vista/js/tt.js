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
    var grupo=document.querySelector('#grupo').value;
    var kcal=document.querySelector('#kcal').value;
    var grasa=document.querySelector('#grasa').value;
    var hCarbono=document.querySelector('#hCarbono').value;
    var proteina=document.querySelector('#proteina').value;
    //agrega elementos al arreglo
    data.push(
        {"id":cant,"nombre":nombre,"nombreAlimento":nombreAlimento,"grupo":grupo,"kcal":kcal,"grasa":grasa,"hCarbono":hCarbono,"proteina":proteina}
    );
   
   //convertir el arreglo a json
  // console.log(JSON.stringify(data));
  var id_row='row'+cant;
  var fila='<tr id='+id_row+'><td>'+nombre+'</td><td>'+nombreAlimento+
  '<td><a href="#" class="btn btn-danger" onclick="Na('+cant+')";>NA</a></td></td><td>'+grupo+'</td><td>'+kcal+
  '</td><td><a href="#" class="btn btn-danger" onclick="ck('+cant+')";>CK</a></td><td>'+grasa+'</td><td><a href="#" class="btn btn-danger" onclick="gr('+cant+')";>GR</a></td><td>'+hCarbono+
  '</td><td><a href="#" class="btn btn-danger" onclick="hc('+cant+')";>hc</a></td><td>'+proteina+
  '</td><td><a href="#" class="btn btn-danger" onclick="actProte('+cant+')";>Cambiar</a></td><td><a href="#" class="btn btn-danger" onclick="confirmarEliminarAlu('+cant+
  ')";>Eliminar</a></td></tr>';
  //agregar fila a la tabla
  $("#lista").append(fila);
  $("#nombre").val('');
  $("#nombreAlimento").val('');
  //$("#grupo").val('');
  $("#kcal").val('');
  $("#grasa").val('');
  $("#hCarbono").val('');
  $("#proteina").val('');
  $("#nombre").focus();
  cant++;
}
/*function eliminar(row){
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
}*/

function save(){
    var json=JSON.stringify(data);
    $.ajax({
        type: "POST",
        url: "../control/api.php",
        data: "json="+json,
        success:function(respo){
           location.reload();
        }
        
    });
}


function confirmarEliminarAlu(row){
            var respuesta = confirm("¿Confirma Eliminar?");
            if(respuesta == true){
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
            }else{
                return false;
            }
        }

function Na(row){
    var respuesta = confirm("¿Actualizar nombre alimento?");
     if(respuesta == true){
        var canti= prompt("realizar correcciones");
        data[row].nombreAlimento=canti;
        var filaid=document.getElementById("row"+row);
        celda=filaid.getElementsByTagName('td');
        celda[1].innerHTML=canti;
    }else{
                return false;
            }
            
        }

function ck(row){
    var respuesta = confirm("¿Actualizar nombre alimento?");
     if(respuesta == true){
    var canti= prompt("realizar correcciones");
    data[row].kcal=canti;
    var filaid=document.getElementById("row"+row);
    celda=filaid.getElementsByTagName('td');
    celda[4].innerHTML=canti;
    }else{
                return false;
            }
            
        }

function gr(row){
    var respuesta = confirm("¿Actualizar grasa?");
     if(respuesta == true){
        var canti= prompt("realizar correcciones");
        data[row].grasa=canti;
        var filaid=document.getElementById("row"+row);
        celda=filaid.getElementsByTagName('td');
        celda[6].innerHTML=canti;
        }else{
                    return false;
                }
            
        }

function hc(row){
    var respuesta = confirm("¿Actualizar hidrato de carbono?");
     if(respuesta == true){  
        var canti= prompt("realizar correcciones");
        data[row].hCarbono=canti;
        var filaid=document.getElementById("row"+row);
        celda=filaid.getElementsByTagName('td');
        celda[8].innerHTML=canti;
        }else{
                    return false;
                }
            
        }

function actProte(row){
    var respuesta = confirm("¿Actualizar proteína?");
     if(respuesta == true){
        var canti= prompt("realizar correcciones");
        data[row].proteina=canti;
        var filaid=document.getElementById("row"+row);
        celda=filaid.getElementsByTagName('td');
        celda[10].innerHTML=canti;
        }else{
                    return false;
                }
            
        }
