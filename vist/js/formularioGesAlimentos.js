const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombreAlimento: /^[a-zA-ZÀ-ÿ\s]{2,20}$/, // Letras y espacios, pueden llevar acentos.
}

const campos = {
	nombreAlimento: false,

}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreAlimento":
			validarCampo(expresiones.nombreAlimento, e.target, 'nombreAlimento');
		break;
		/*case "apellidoPaterno":
			validarCampo(expresiones.apellidoPaterno, e.target, 'apellidoPaterno');
		break;
		case "apellidoMaterno":
			validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
		break;
		case "fecha":
			validarCampo(expresiones.fecha, e.target, 'fecha');
		break;
		case "fechaFin":
			validarCampo(expresiones.fechaFin, e.target, 'fechaFin');
		break;
		case "telefonoAlumno":
			validarCampo(expresiones.telefonoAlumno, e.target, 'telefonoAlumno');
		break;*/
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

function regAsig(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreAlimento){
			var porcion = $('#porcion').val();
			var nombreAlimento = $('#nombreAlimento').val();
			var grupo = $('#grupo').val();
			var kcal = $('#kcal').val();
			var grasa = $('#grasa').val();
			var hCarbono = $('#hCarbono').val();
			var proteina = $('#proteina').val();
			$.post('../control/agregarAlimento.php',{porcion:porcion,nombreAlimento:nombreAlimento, grupo:grupo, kcal:kcal,grasa:grasa, hCarbono:hCarbono, proteina:proteina})

			formulario.reset();

			document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
			}, 5000);

			document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
				icono.classList.remove('formulario__grupo-correcto');
			});
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		} else {
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
			}, 5000);
		}
	});	
}