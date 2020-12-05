
<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";
	include "../app/app.php";

	include "../app/authController.php";
	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$authController = new AuthController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	$apps = $authController->logout();
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

	<style type="text/css">
		
	</style>

	<title>Peliculas</title>
</head>
<body>

	<?php include "../layouts/alerts.template.php"; ?>

	<div class="barraMenu">
		<div style="
    		margin-left: 2%;">
			<img src="../assets/img/logoPelicula2.png">	
		</div>
		<div style="color: white">
			<ul style="display: inline-flex;">
				<li>
					<!-- <a href="#"> -->Inicio<!-- </a>  -->
				</li>
				<!-- <li>
					
				</li> -->
				<li>
					<!-- <a href="#lamejorespeliculas"> --> Recomendaciones de peliculas<!-- </a> -->
				</li>
				<li>
					Estrenos
				</li>
			</ul>
		</div>

		<div style="margin-left: 35%;margin-top: 25px;">
			

			<a href="../index.php"><button style="background: none; color: white;" type="submit" class="close" title="SALIR">SALIR</button></a>
			<input type="hidden" name="action" value="logout">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
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
				<div id="catalogo">
					<h2> </h2>
					<?php foreach ($movies as $movie): ?>
						<div class="moviesCartelera" style="display: inline-block;">	
							<div style="text-align: center;width: 100%;height: 100%;">
								<a onclick="vista(<?= $movie['id'] ?>,'<?= $movie['title'] ?>')"><img style="width: 100%; border-radius: 10%" src="../assets/img/movies/<?= $movie['cover'] ?>"></a>
							</div>

							<div style="text-align: center;">
								<?= $movie['title'] ?>
							</div>
						</div>
						
						<!-- <br> -->
						<!-- <td style="text-align: center;">
							<?= $movie['minutes'] ?>
						</td> -->						
					<?php endforeach ?>



					<!-- <div>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/ffZ1V88qQNA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div> -->
				</div>

				<div id="infomarcionPeli" style="display: none;">
					<h1>Pelicula</h1>
					<div id="title">
						<div>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/8-yREEt4uDM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<input type="hidden" name="id" id="id">
					</div></div>
					</div>


				<div class="derechos">
					<p>
 						<span>Privacy Policy</span> | This is a sample website - cmsmasters © 2020 / All Rights Reserved
 					</p>
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

	<script type="text/javascript">
		
		function vista(id,title) {
			document.getElementById('lamejorespeliculas').style.display="none";
			document.getElementById('catalogo').style.display="none";

			document.getElementById('infomarcionPeli').style.display="block";
			// document.getElementById('updateForm').style.display="block";

			document.getElementById('title').value = title;

		// 	document.getElementById('description').value = description;
		// 	document.getElementById('status').value = status;
		// 	document.getElementById('id').value = id;
		}
	</script>
</body>
</html>