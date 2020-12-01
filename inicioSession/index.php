<?php

	include '../app/app.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/estiloLogin.css?v=0.0.3" media="all">
	<title>Loggin o registro</title>
</head>
<body>

	<?php include "../layouts/alerts.template.php"; ?>



	<form class="login" method="POST" action="../auth"> 
		<img src="../assets/img/logoPelicula2.png">
		<div class="loginHeder">
			<div class="PrinciLogin">
				<h1>Registro</h1>
				<div>
					<label>Nombre completo: </label><br>
					<input type="text" name="name" required=""><br>
					<label>Correo:</label><br>
					<input type="email" name="email1" id="email1" placeholder="ingresa tu correo valido" required=""><br>
					<label>Contraseña:</label><br>
					<input type="password" name="password" id="password" required=""><br>
					<div class="areaRegistro">
						<button type="submit">Registro</button><br>

						<input type="hidden" name="action" value="register">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

					</div>
					<a href="../index.php">Cancelar</a><br>
				</div>
			</div>
		</div>
		<div>
			<p>
 				<span>Privacy Policy</span> | This is a sample website - cmsmasters © 2020 / All Rights Reserved
 			</p>
		</div>
	</form>