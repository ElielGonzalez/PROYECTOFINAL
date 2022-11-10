<?php
	session_start(); //Validaciones de los inicios de sesión de los roles de profesor, alumno o administrador
	require("../conexion/connect_db.php");
	$username=$_POST['correo'];
	$pass=$_POST['contrase'];
	//confirmar usuario alumno
	$sql=mysqli_query($mysqli,"SELECT * FROM alumno WHERE correo='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['contrasenia']){
			$_SESSION['matricula']=$f['matricula'];
			$_SESSION['nombreAalumno']=$f['nombreAalumno'];
			$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexAlumno.php");
		}else{
			$sql=mysqli_query($mysqli,"SELECT * FROM alumno WHERE correo='$username'");
			$nr = mysqli_num_rows($sql);
			$buscarpass = mysqli_fetch_array($sql);
			if (($nr == 1) && (password_verify($pass, $buscarpass['contrasenia']))) {
				$_SESSION['matricula']=$f['matricula'];
				$_SESSION['nombreAalumno']=$f['nombreAalumno'];
				$_SESSION['rol']=$f['rol'];
			header("Location: ../vista/indexAlumno.php");
			}else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='../vista/Login.php'</script>";
		}
	}
	}else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='../vista/Login.php'</script>";	
	}


?>