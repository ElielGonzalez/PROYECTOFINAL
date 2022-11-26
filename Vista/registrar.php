<?php 
	require "send_email.php";
	$_SESSION['nombre'] = $_POST['nombre'];
	$_SESSION['apellido'] = $_POST['apellido'];
	$_SESSION['email'] = $_POST['email'];
	//$_SESSION['password'] = $_POST['password'];
	$nombre = $mysqli->escape_string($_POST['nombre']);
	$apellido = $mysqli->escape_string($_POST['apellido']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = $mysqli->escape_string(password_hash($_POST['password'],PASSWORD_BCRYPT));
	$hash = $mysqli->escape_string(md5(rand(0, 1000)));


	$result = $mysqli->query("SELECT * FROM nutriolgo WHERE correo = '$email'") or die($mysqli->error);

	if ($result->num_rows > 0) {
		$_SESSION['message']= "usuario con este correo ya existe";
		header("Location: error.php");
		exit();
	}else{
		$sql = "INSERT INTO nutriolgo (cedula, nombreNutriologo, apellidoPatermo, ApellidoMateno, telefono, `correo`, `contrasenia`, `foto`, `hash`, `activo`, `rol`) VALUES ('GVE', '$nombre', '$apellido', 'V', NULL, '$email', '$password', 'foto', '$hash', '0', '1')";
		if ($mysqli->query($sql)) {
			$_SESSION['LG']= true;
			$para_usuario = $email;
			$subject = 'verifica  tu cuenta (gveo181997@upemor.edu.mx)';
			$message_body = 'hola'.$nombre.',
			grecia por registrate por favor confirma tu cuenta haciendo click en este link
			http://localhost/ls/verificar.php?email='.$email.'&hash='.$hash;
			sendEmail($para_usuario,$subject,$message_body);
			header('Location: perfil.php');
		}else{
			$_SESSION['message']= "ocurrio un error";

			header("Location: error.php");
			exit();
		}
	}

?>
