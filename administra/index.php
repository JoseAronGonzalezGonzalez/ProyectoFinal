<?php 
	include "../app/categoryController.php";
	$categoryController = new CategoryController();

	$categories = $categoryController->get();

	#echo json_encode($categories);

	if (isset($_SESSION)==false || isset($_SESSION['id'])==false) {
		header("Location:../");
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/estiloadmi.css?v=0.0.1" media="all">

	<title></title>
</head>
<body>
	
	<div class="lateralIzq" style="background-color: black";>
		<div class="dentroEstatico">
			<img src="../assets/img/logoPelicula2.png">
			<div class="op">
			<a class="op1" href="../peliculas"><p>Agregar,eliminar,editar Una Pelicula</p></a>
			<a class="op1" href="../category"><p>Agregar una Categoria</p></a>
			<a class="op1" href="../index.php"><p>Salir</p></a>
			
			</div>	
		</div>
		<div class="derechos">
			<p>© Robert Morley Jr. <br>All rights reserved 2020</p>
		</div>
	</div>

	<div class="herramientas">

	</div>

</body>
</html>