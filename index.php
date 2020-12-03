
<?php

	include 'app/app.php';
	// session_destroy();
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/estiloLogin.css?v=0.0.3" media="all">
	<title>Loggin o registro</title>
</head>
<body>

	<?php include "layouts/alerts.template.php"; ?>

	<form class="login" method="POST" action="auth"> 
		<img src="assets/img/logoPelicula2.png">
		<div class="loginHeder">
			<div class="PrinciLogin">
				<h1>Inicia sesion</h1>
				<div>
					<label>Correo:</label><br>
					<input type="email" name="email" id="email" placeholder="ingresa tu correo" required=""><br>
					<label>Contraseña:</label><br>
					<input type="password" name="password" id="password" required=""><br>
					<div class="areaRegistro">

						<div class="alerts"><?php echo isset($alerts) ? $alerts : ""; ?></div>
						<button type="submit">Iniciar sesion</button><br>

						<input type="hidden" name="action" value="login">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

						<label>¿Quires registrarte?</label><a href="./inicioSession/index.php">Resgistrate</a>
					</div>
				</div>
			</div>
		</div>
		<div>
			<p>
 				<span>Privacy Policy</span> | This is a sample website - cmsmasters © 2020 / All Rights Reserved
 			</p>
		</div>
	</form>


<!-- 	<form method="POST" action="auth">

	</form> -->

</body>
</html>