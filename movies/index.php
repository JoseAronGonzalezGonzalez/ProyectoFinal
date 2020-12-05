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
<html>
<head>

	<link rel="stylesheet" type="text/css" href="./assets/css/estiloadmi.css?v=0.0.1" media="all">
	<title>
		Movies administrador
	</title>
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		#updateForm{
			display: none;
		}

		.herramientas{

		 	 float: left;
   			 position: absolute;
   			 left: 370px;

		}
		body{

			margin: 0;
		}
	</style>
</head>
<body>

	<div class="lateralIzq" style="background-color: black;">
		<div class="dentroEstatico">
			<img src="./assets/img/logoPelicula2.png">
			<div class="op">
			<a class="op1" href="./peliculas"><p>Agregar,eliminar,editar Una Pelicula</p></a>
			<a class="op1" href="./category"><p>Agregar una Categoria</p></a>
			<a class="op1" href="./index.php"><p>Salir</p></a>
			
			</div>	
		</div>
		<div class="derechos">
			<p>© Robert Morley Jr. <br>All rights reserved 2020</p>
		</div>
	</div>

	<div class="herramientas">
		<h1 >
			Peliculas
		</h1>



		<?php include "../layouts/alerts.template.php"; ?>

		<table>
			<thead>
				<th>
					#
				</th>
				<th>
					title
				</th>
				<th>
					cover
				</th>
				<th>
					minutes
				</th>
				<th>
					category
				</th>
				<th>
					acciones
				</th>
			</thead>
			<tbody>
				<?php foreach ($movies as $movie): ?>
				<tr>
					<td style="padding: 0px 20px">
						<?= $movie['id'] ?>
					</td>
					<td style="padding: 0px 10px">
						<?= $movie['title'] ?>
					</td>
					<td style="text-align: center;width: 55%;">
						<img style="width: 15%" src="./assets/img/movies/<?= $movie['cover'] ?>">
					</td>
					<td style="text-align: center;">
						<?= $movie['minutes'] ?>
					</td>
					<td style="padding: 0px 20px"> 
						<?= $movie['category_id'] ?><br>
						<a href="details/?id=<?= $movie['id'] ?>">
							show details
						</a>
					</td>
					<td>
						<button onclick="edit(<?= $movie['id'] ?>,'<?= $movie['title'] ?>','<?= $movie['description'] ?>','<?= $movie['minutes'] ?>','<?= $movie['category_id'] ?>')">
							Edit Pelicula
						</button>

						<button onclick="remove(<?= $movie['id'] ?>)" style="background-color: #393187;color:white;">
							Delete pelicula
						</button>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<form  id="storeForm" action="./movie" method="POST" enctype="multipart/form-data" >
			<fieldset>
				<legend>
					Add Movie
				</legend>


				<label>
					Title
				</label>
				<input type="text" name="title" placeholder="movie name" required="">

				<br>

				<label>
					Description
				</label>
				<textarea name="descripiton" rows="5" placeholder="Description" required=""></textarea>

				<br>

				<label>
					Cover
				</label>
				<input type="file" name="cover" required="" accept="image/*">

				<br>

				<label>
					Minutes
				</label>
				<input type="number" name="minutes" placeholder="80" required="">
				
				<br>

				<label>
					Clasification
				</label>
				<select  name="clasification" required="">
					<option> C </option>
					<option> B15 </option>
					<option> BA </option>
					<option> A </option>
				</select>
				<br>


				<label>
					Category
				</label>
				<select  name="category_id" required=""> 
					<?php foreach ($categories as $category): ?>

					<option value="<?= $category['id'] ?>" >
						<?= $category['name'] ?>
					</option>

					<?php endforeach ?>

					<?php 
					// foreach ($categories as $category) {
					// 	echo "<option value=".$category['id']." >". $category['name'] ."</option>";
					// } 
					?>
				</select>
				<br>

				<button type="submit">
					Save
				</button>
				<input type="hidden" name="action" value="store">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
			</fieldset>
		</form>

		<form id="updateForm" action="./movie" method="POST" enctype="multipart/form-data" >
			<fieldset>
				<legend>
					edit Movie
				</legend>


				<label>
					Title
				</label>
				<input type="text" id="title" name="title" placeholder="movie name" required="">

				<br>

				<label>
					Description
				</label>
				<textarea name="descripiton" id="description" rows="5" placeholder="description" required=""></textarea>

				<br>
<!-- 
				<label>
					Cover
				</label>
				<input type="file" name="cover" required="" accept="image/*">
 -->
				<br>

				<label>
					Minutes
				</label>
				<input type="number" id="minutes" name="minutes" placeholder="80" required="">
				
				<br>

				<!-- <label>
					Clasification
				</label>
				<select  name="clasification" required="">
					<option> C </option>
					<option> B15 </option>
					<option> BA </option>
					<option> A </option>
				</select>
				<br> -->


				<label>
					Category
				</label>
				<select  name="category_id" id="category_id" required=""> 
					<?php foreach ($categories as $category): ?>

					<option value="<?= $category['id'] ?>" >
						<?= $category['name'] ?>
					</option>

					<?php endforeach ?>

					<?php 
					// foreach ($categories as $category) {
					// 	echo "<option value=".$category['id']." >". $category['name'] ."</option>";
					// } 
					?>
				</select>
				<br>

				<button type="submit">
					salvar editado
				</button>
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
			</fieldset>
		</form>


		<form id="destroyForm" action="./movie" method="POST">

			<input type="hidden" name="action" value="destroy">
			<input type="hidden" name="id" id="id_destroy">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

		</form>


	</div>


	<script type="text/javascript">
		function edit(id,title,description,minutes)
		{	
			document.getElementById('storeForm').style.display="none";
			document.getElementById('updateForm').style.display="block";

			document.getElementById('title').value = title;
			document.getElementById('description').value = description;
			document.getElementById('minutes').value = minutes;
			document.getElementById('category_id').value = category_id;
			document.getElementById('id').value = id;
		}

		function remove(id)
		{
			var confirm = prompt("Si quiere eliminar el registro, escriba :"+id);
			if (confirm == id) {

				document.getElementById('id_destroy').value = id;
				document.getElementById('destroyForm').submit();

			}
		}
	</script>
</body>
</html>