const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	matricula: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombreAlumno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoPpaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoMaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	contrasenia: /^.{4,12}$/, // 4 a 12 digitos.
}
/*Todos los campos del formulario deben estar falsos para posteriormente evaluar 
que no estan vacios y poder registrar*/
const campos = {
	matricula: false,
	nombreAlumno: false,
	apellidoPpaterno: false,
	apellidoMaterno: false,
	correo: false,
	contrasenia: false,
	
}
/*Validamos el campo con la información insertada del usuario y comparamos con 
las expresiones regulares*/
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "matricula":
			validarCampo(expresiones.matricula, e.target, 'matricula');
		break;
		case "nombreAlumno":
			validarCampo(expresiones.nombreAlumno, e.target, 'nombreAlumno');
		break;
		case "apellidoPpaterno":
			validarCampo(expresiones.apellidoPpaterno, e.target, 'apellidoPpaterno');
		break;
		case "apellidoMaterno":
			validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "contrasenia":
			validarCampo(expresiones.contrasenia, e.target, 'contrasenia');
		break;
	}
}
/* Validación de los campos y estilos */
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
/* funcion para el registro del alumno aqui primero validamos que todos tengan información
para posteriormente mandarlos por el metodo post a la ruta donde se enviara a guardar
a la base de datos */
function regAlumno(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.matricula && campos.nombreAlumno && campos.apellidoPpaterno && campos.apellidoMaterno && campos.correo && campos.contrasenia){
			var matricula = $('#matricula').val();
			var nombreAlumno = $('#nombreAlumno').val();
			var apellidoPpaterno = $('#apellidoPpaterno').val();
			var apellidoMaterno = $('#apellidoMaterno').val();
			var sexo = $('#sexo').val();
			var carrera_alumno = $('#carrera_alumno').val();
			var grupo = $('#grupo').val();
			var cuatrimestre = $('#cuatrimestre').val();
			var correo = $('#correo').val();
			var contrasenia = $('#contrasenia').val();
			var nutriolgo_cedula = $('#nutriolgo_cedula').val();
			

			$.post('../control/agregarAlumno.php',{matricula:matricula, nombreAlumno:nombreAlumno, apellidoPpaterno:apellidoPpaterno,
			 apellidoMaterno:apellidoMaterno, sexo:sexo, carrera_alumno:carrera_alumno, grupo:grupo, cuatrimestre:cuatrimestre, correo:correo, contrasenia:contrasenia, nutriolgo_cedula:nutriolgo_cedula})

			formulario.reset();
			location.href='../vista/indexDocente.php';

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
/* funcion para el registro del alumno aqui primero validamos que todos tengan información
para posteriormente mandarlos por el metodo post a la ruta donde se enviara a modificar
a la base de datos */
function actAlumno(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreAlumno){
			var matricula = $('#matricula').val();
			var nombreAlumno = $('#nombreAlumno').val();
			var apellidoPpaterno = $('#apellidoPpaterno').val();
			var apellidoMaterno = $('#apellidoMaterno').val();
			var sexo = $('#sexo').val();
			var carrera_alumno = $('#carrera_alumno').val();
			var grupo = $('#grupo').val();
			var cuatrimestre = $('#cuatrimestre').val();
			var correo = $('#correo').val();
			var contrasenia = $('#contrasenia').val();
			var nutriolgo_cedula = $('#nutriolgo_cedula').val();

			$.post('../control/cambiarAlumno.php',{matricula:matricula, nombreAlumno:nombreAlumno, apellidoPpaterno:apellidoPpaterno,
			 apellidoMaterno:apellidoMaterno, sexo:sexo, carrera_alumno:carrera_alumno, grupo:grupo, cuatrimestre:cuatrimestre, correo:correo, contrasenia:contrasenia,nutriolgo_cedula:nutriolgo_cedula})

			formulario.reset();
			location.href='../vista/indexDocente.php';

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