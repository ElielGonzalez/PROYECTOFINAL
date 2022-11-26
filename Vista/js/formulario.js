const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombreNutriologo: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoPatermo: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	ApellidoMateno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	contrasenia:  /^.{4,12}$/, // 4 a 12 digitos.
}

const campos = {
	nombreNutriologo: false,
	apellidoPatermo: false,
	ApellidoMateno: false,
	contrasenia: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreNutriologo":
			validarCampo(expresiones.nombreNutriologo, e.target, 'nombreNutriologo');
		break;
		case "apellidoPatermo":
			validarCampo(expresiones.apellidoPatermo, e.target, 'apellidoPatermo');
		break;
		case "ApellidoMateno":
			validarCampo(expresiones.ApellidoMateno, e.target, 'ApellidoMateno');
		break;
		case "contrasenia":
			validarCampo(expresiones.contrasenia, e.target, 'contrasenia');
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

function reg(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreNutriologo && campos.apellidoPatermo && campos.ApellidoMateno && campos.contrasenia){
			var cedula = $('#cedula').val();
			var nombreNutriologo = $('#nombreNutriologo').val();
			var apellidoPatermo = $('#apellidoPatermo').val();
			var ApellidoMateno = $('#ApellidoMateno').val();
			var telefono = $('#telefono').val();
			var correo = $('#correo').val();			
			var contrasenia = $('#contrasenia').val();
			var foto = $('#foto').val();
			$.post('../control/agregarDocente.php',{cedula:cedula, nombreNutriologo:nombreNutriologo, apellidoPatermo:apellidoPatermo, ApellidoMateno:ApellidoMateno, telefono:telefono, 
				correo:correo, contrasenia:contrasenia, foto:foto})

			formulario.reset();
			location.href='../vista/indexAdmin.php';

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

function actProfe(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreNutriologo){
			var cedula  = $('#cedula ').val();
			var nombreNutriologo = $('#nombreNutriologo').val();
			var apellidoPatermo = $('#apellidoPatermo').val();
			var ApellidoMateno = $('#ApellidoMateno').val();
			var telefono = $('#telefono').val();
			var correo = $('#correo').val();
			var contrasenia = $('#contrasenia').val();
			var foto = $('#foto').val();
			$.post('../control/cambiarProfesor.php',{cedula :cedula , nombreNutriologo:nombreNutriologo, apellidoPatermo:apellidoPatermo, ApellidoMateno:ApellidoMateno, telefono:telefono, 
				correo:correo, contrasenia:contrasenia, foto:foto})

			formulario.reset();
			location.href='../vista/indexAdmin.php';

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