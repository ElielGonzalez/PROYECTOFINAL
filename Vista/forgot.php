<?php 

require "send_email.php";
require 'db.php';
ob_start();
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$email = $mysqli->escape_string($_POST['email']);

	$result = $mysqli->query("SELECT * FROM nutriolgo WHERE correo = '$email'");

	if($result->num_rows === 0){
		$_SESSION['message'] = "El usuario con ese correo no fue encontrado o no esta en la tabla!";
		//header('Location: error.php');
		//exit();
	}else{
		$user = $result->fetch_assoc();

		$email = $user['correo'];
		$nombre = $user['nombreNutriologo'];
		$contrasenia= $user['contrasenia'];

		$_SESSION['message'] = 'Por favor revisa tu correo <strong>'.$email.'</strong>'
		. ' Te llegará un correo con tu contraseña!';

		$para_usuario = $email;
		$subject = 'Sistema web de nutrición';
		$message_body = '
		Hola '.$nombre.',
		<br/>Has pedido un cambio de contraseña!
		Tu contraseña es: "'.$contrasenia.'"
		Esta es la contraseña para el correo: '.$email;

		sendEmail($para_usuario, $subject, $message_body);
		header('Location: success.php');
		exit();
	}

}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$email = $mysqli->escape_string($_POST['email']);

	$result = $mysqli->query("SELECT * FROM alumno WHERE correo = '$email'");

	if($result->num_rows === 0){
		$_SESSION['message'] = "El usuario con ese correo no fue encontrado!";
		//header('Location: error.php');
		//exit();
	}else{
		$user = $result->fetch_assoc();

		$email = $user['correo'];
		$nombre = $user['nombreAalumno'];
		$contrasenia= $user['contrasenia'];

		$_SESSION['message'] = 'Por favor revisa tu correo <strong>'.$email.'</strong>'
		. ' Te llegará un correo con tu contraseña!';

		$para_usuario = $email;
		$subject = 'Sistema web de nutrición';
		$message_body = '
		Hola '.$nombre.',
		<br/>Has pedido un cambio de contraseña!
		Tu contraseña es:'.$contrasenia.'
		Esta es la contraseña para el correo: '.$email;

		sendEmail($para_usuario, $subject, $message_body);
		header('Location: success.php');
		exit();
	}

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$email = $mysqli->escape_string($_POST['email']);

	$result = $mysqli->query("SELECT * FROM administrador WHERE correo_admin = '$email'");

	if($result->num_rows === 0){
		$_SESSION['message'] = "El usuario con ese correo no fue encontrado!";
		header('Location: error.php');
		exit();
	}else{
		$user = $result->fetch_assoc();

		$email = $user['correo_admin'];
		$nombre = $user['nombre'];
		$contrasenia= $user['contrasenia_admin'];

		$_SESSION['message'] = 'Por favor revisa tu correo <strong>'.$email.'</strong>'
		. 'Te llegará un correo con tu contraseña!';

		$para_usuario = $email;
		$subject = 'Sistema web de nutrición';
		$message_body = '
		Hola '.$nombre.',
		<br/>Has pedido un cambio de contraseña!
		Tu contraseña es:'.$contrasenia.'
		Esta es la contraseña para el correo:'.$email;

		sendEmail($para_usuario, $subject, $message_body);
		header('Location: success.php');
		exit();
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recupera tu contraseña</title>
	<?php include 'css/css.html'; ?>
</head>
<body>

	<div class="form">
		
		<h1>Recupera tu contraseña</h1>

		<form action="forgot.php" method = "post">
			<div>
             <input class="form-control" type="email" placeholder= "Ingresa tu correo" required autocomplete="off" name="email"/>			
			</div>
			<br/>
			<button class="button button-block"/>Enviar</button>
		</form>

	</div>
	
</body>
</html>