(function(){
    // generamos un evento para cuando se haga submit en el formulario
    document.querySelector("#formulario").addEventListener("submit",calcular);
 
    // función que realiza los calculos

  function calcular(e) {
 
        // cancelamos el evento
        e.preventDefault();
 
        // obtenemos los valores del formulario
        var altura=document.querySelector("#formulario input[name=altura]").value;
        var edad=document.querySelector("#formulario input[name=edad]").value;
        var sexo=document.querySelector("#formulario input[name=sexo]:checked").value;
        var peso=document.querySelector("#formulario input[name=peso]").value;
 
        var resultado=document.getElementById("resultado");
 
        if(parseInt(altura)>0 && parseInt(edad)>0 && sexo && parseInt(peso)>0) {
 
            // buscamos el peso idoneo
            var pe= altura/100;
            var imc= peso/(pe*pe)

            var pesoIdeal=50+((altura-150)/4)*3+(edad-20)/4
            if(sexo=="M") {
                pesoIdeal=pesoIdeal*0.9;
            }
 
            resultado.classList.remove("red");
            resultado.classList.add("green");
 
            // mostramos el resultado en relación a nuestro peso
            var respuesta="";
            if(pesoIdeal>peso) {
                respuesta="Tu peso ideal seria: "+pesoIdeal+" kilos";
                //respuesta+="<br>Te falta: "+(imc*1).toFixed(2)+" kilos";
                if(imc<18.5){ respuesta+= "<br>IMC:"+imc+"Peso inferior al normal"; }

            else if(imc>=18.5 && imc<=24.99){ respuesta+= "<br>IMC:"+imc+"<br>Peso normal"; }

            else if(imc>=25 && imc<=29.9){ respuesta+= "<br>IMC:"+imc+"<br>Peso superior al normal"; }

            else if(imc>30){ respuesta+= "<br>IMC:"+imc+"<br>Obesidad"; }
            }else if(pesoIdeal<peso){
                respuesta="Tu peso ideal seria: "+pesoIdeal+" kilos";
                //respuesta+="<br>Te sobran: "+(imc*1).toFixed(2)+" kilos";

            if(imc<18.5){ respuesta+= "<br>IMC:"+imc+"Peso inferior al normal"; }

            else if(imc>=18.5 && imc<=24.9){ respuesta+= "<br>IMC:"+imc+"<br>Peso normal"; }

            else if(imc>=25 && imc<=29.9){ respuesta+= "<br>IMC:"+imc+"<br>Peso superior al normal"; }

            else if(imc>30){ respuesta+= "<br>IMC:"+imc+"<br>Obesidad"; }







            }else{
                respuesta="Estas en tu peso ideal!!!";
            }
 
            resultado.innerHTML=respuesta;

        }else{
 
            // mostramos un mensaje de error si alguno de los valores no es correcto
            resultado.classList.remove("green");
            resultado.classList.add("red");
            resultado.innerHTML="Alguno de los valores es incorrecto";
        }
    }
})()