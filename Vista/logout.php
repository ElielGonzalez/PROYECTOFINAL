<?php
	session_start();
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logout</title>
	 <?php include 'css/css.html'; ?>
</head>
<body>
	<div class="form">
		<h1>Haz cerrado tu sesión</h1>
		<a href="index.php"><button class = "button button-block">HOME</button></a>
	</div>
	
</body>
</html>