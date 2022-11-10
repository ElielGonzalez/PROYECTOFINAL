const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	porcion: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
}

const campos = {
	porcion: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "porcion":
			validarCampo(expresiones.porcion, e.target, 'porcion');
		break;
		
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

function regUnidad(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.porcion){
			var porcion = $('#porcion').val();
			var nombreAlimento = $('#nombreAlimento').val();
			var alumno = $('#alumno').val();
			$.post('../control/agregarPlan.php',{porcion:porcion, nombreAlimento:nombreAlimento,
			 alumno:alumno})

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

function actUnidad(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.porcion && campos.nombreAlimento && campos.alumno){
			var idUnidad = $('#idUnidad').val();
			var porcion = $('#porcion').val();
			var nombreAlimento = $('#nombreAlimento').val();
			var alumno = $('#alumno').val();
			var kcal = $('#kcal').val();
			var grasa = $('#grasa').val();
			var hCarbono = $('#hCarbono').val();
			var proteina = $('#proteina').val();
			$.post('../control/cambiarUnidad.php',{idUnidad:idUnidad, porcion:porcion, nombreAlimento:nombreAlimento,
			 alumno:alumno, kcal:kcal, grasa:grasa, hCarbono:hCarbono, proteina:proteina})

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