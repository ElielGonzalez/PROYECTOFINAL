<?php
require "db.php";
ob_start();
session_start();
/*if ($_SESSION['LG']== true) {
	header("Location: perfil.php");
	// code...
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include 'css/css.html' ?>
</head>
<?php
	if ($_SERVER['REQUEST_METHOD']=== 'POST') {
		if (isset($_POST['login'])) {
			require "login.php";
			
		}elseif (isset($_POST['registrar'])) {
			require "registrar.php";
		}
	}


?>
<body>
	<div class="container">
		<div class="panel-body">
			<div class="row">
				<div class="form">
					<div class="panel-heading">
						<div class="row">
							<ul class="botones-principales">
								<li class="tab active"><a href="#login">Login</a></li>
								<li class="tab"><a href="#sigup">Crear cuenta</a></li>

							</ul>
						</div>
						
					</div>
					<form action="index.php" method="post" class="form-login" style="display: block;">
						<input type="email" class="form-control" placeholder="&#xf0e0; Correo" style="font-family: FontAwesome;" name="email" required autofocus>
						<input type="password" class="form-control" placeholder="&#xf023; contrasenia" style="font-family: FontAwesome;" name="password" required>
						<button class="button button-block" name="login">Ingresar</button>
						<div class="form-group">
							<div class="row">
								<div>
									<a href="forgot.php">Olvisdaste tu contrasenia</a>
								</div>
							</div>
						</div>
					</form>
					<form action="index.php" method="post" class="form-create" style="display:  none"><br>
						<input type="text" placeholder="Nombre" class="form-control" autocomplete="off" name="nombre" required><br>
						<input type="text" placeholder="Apellido" class="form-control" autocomplete="off" name="apellido"><br>
						<input type="email" placeholder="correo" class="form-control" autocomplete="" name="email"><br>
						<input type="password" placeholder="contrasenia" class="form-control" autocomplete="off" name="password">
						<button type="submit" class="button button-block" name="registrar">Resgistrarse</button>
						
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<script src="js/index.js"></script>

</body>
</html>