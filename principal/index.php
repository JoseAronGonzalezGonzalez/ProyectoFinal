
<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	// if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
	// 	header("Location:../");
	// }
	if (isset($_SESSION)==false || isset($_SESSION['id'])==false) {
		header("Location:../");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<link rel="stylesheet" type="text/css" href="../assets/css/estilo.css?v=0.0.3" media="all">

	<title>Peliculas</title>
</head>
<body>

	<?php include "../layouts/alerts.template.php"; ?>

	<div class="barraMenu">
		<div>
			<img src="../assets/img/logoPelicula2.png">	
		</div>
		<div style="color: white">
			<ul style="display: inline-flex;">
				<li>
					Inicio
				</li>
				<!-- <li>
					
				</li> -->
				<li>
					Recomendaciones de peliculas
				</li>
				<li>
					Estrenos
				</li>
			</ul>
		</div>
		<div class="btn-reg-log">
			<!-- <button>iniciar secion</button> -->
			<!-- btn-abrir-popup -->
			<!-- <button id="btn-abrir-popup" href ="./inicioSession/index.php" class="btn-abrir-popup">Iniciar Sesion</button> -->
			<!-- <a href="./inicioSession/index.php"></a> -->


		</div>
	</div>

	<div id="vistapeliculas">
		<div>
			<div>
				<div id="lamejorespeliculas">
					<h2>Las mejores peliculas y recomendadas</h2>
				</div>
				<div>
					<h2> </h2>
					<?php foreach ($movies as $movie): ?>
						<div style="text-align: center;">
							<img style="width: 10%" src="../assets/img/movies/<?= $movie['cover'] ?>">
						</div>

						<div style="text-align: center;">
							<?= $movie['title'] ?>
						</div>
						
						<br>
						<!-- <td style="text-align: center;">
							<?= $movie['minutes'] ?>
						</td> -->						
					<?php endforeach ?>

					<div class="derechos">
						<p>
 							<span>Privacy Policy</span> | This is a sample website - cmsmasters © 2020 / All Rights Reserved
 						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- 
	<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>inicio de sesion</h3>
				<h4>y recibe un cupon de descuento.</h4>
				<form action="">
					<div class="contenedor-inputs">
						
						<input type="email" placeholder="Correo">
						<input type="password" placeholder="Contraseña">
					</div>
					<input type="submit" class="btn-submit" value="Inicio">
				</form>
			</div>
		</div> -->

	<!-- <script src="./assets/js/js.js"></script> -->

	
</body>
</html>