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
<html>
<head>

	<link rel="stylesheet" type="text/css" href="../assets/css/estiloadmi.css?v=0.0.1" media="all">
	<title>
		Categories
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
	</style>
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

		<h1>
			Categorias
		</h1>

		<?php 

		if (isset($_SESSION) && isset($_SESSION['error'])) {

			echo "<h3> Error: ".$_SESSION['error']."</h3>";
			unset($_SESSION['error']);

		}

		?> 

		<?php include "../layouts/alerts.template.php"; ?>

		<!-- <div>
			<a href="./salir.php"><button type="submit" class="close" title="SALIR">SALIR</a>

		</div> -->

		<table>
			<thead>
				<th>
					#
				</th>
				<th>
					Name
				</th>
				<th>
					Description
				</th>
				<th>
					Actions
				</th>
			</thead>
			<tbody>

				<?php foreach ($categories as $category): ?>

				<tr>
					
					<td>
						<?= $category['id'] ?>
					</td>
					<td>
						<?= $category['name'] ?>
					</td>
					<td>
						<?= $category['description'] ?>
					</td>
					<td>
						<button onclick="edit(<?= $category['id'] ?>,'<?= $category['name'] ?>','<?= $category['description'] ?>','<?= $category['status'] ?>')">
							Edit category
						</button>

						<button onclick="remove(<?= $category['id'] ?>)" style="background-color: #393187;;color:white;">
							Delete category
						</button>
					</td>

				</tr>
					
				<?php endforeach  ?>
				
				<?php   

				// foreach ($categories as $category) {
					
				// 	echo "<tr>
					
				// 		<td>
				// 			".$category['id']."
				// 		</td>
				// 		<td>
				// 			".$category['name']."
				// 		</td>
				// 		<td>
				// 			".$category['description']."
				// 		</td>

				// 		<td>
				// 			<button onclick='edit(".$category['id'].",\"".$category['name']."\",\"".$category['description']."\",\"".$category['status']."\")' >
				// 				Edit category
				// 			</button>

				// 			<button onclick='delete(".$category['id'].")' > Delete category </button>

				// 		</td>

				// 	</tr>";

				// }


				?> 

			</tbody>
		</table>

		<form id="storeForm" action="../categori" method="POST">
			<fieldset>
				
				<legend>
					Add new Category
				</legend>

				<label>
					Name
				</label>
				<input type="text"  name="name" placeholder="terror" required=""> 
				<br>

				<label>
					Description
				</label>
				<textarea placeholder="write here" name="description" rows="5" required=""></textarea>
				<br>

				<label>
					Status
				</label>
				<select name="status">
					<option> active </option>
					<option> inactive </option>
				</select>
				<br>

				<button type="submit" >Save Category</button>
				<input type="hidden" name="action" value="store">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

			</fieldset>
		</form>

		<form id="updateForm" action="../categori" method="POST">
			<fieldset>
				
				<legend>
					Edit Category
				</legend>

				<label>
					Name
				</label>
				<input type="text" id="name" name="name" placeholder="terror" required=""> 
				<br>

				<label>
					Description
				</label>
				<textarea placeholder="write here" id="description" name="description" rows="5" required=""></textarea>
				<br>

				<label>
					Status
				</label>
				<select id="status" name="status">
					<option> active </option>
					<option> inactive </option>
				</select>
				<br>

				<button type="submit" >Save Category</button>
				<input type="hidden" name="action" value="update">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

			</fieldset>
		</form>

		<form id="destroyForm" action="../categori" method="POST">

			<input type="hidden" name="action" value="destroy">
			<input type="hidden" name="id" id="id_destroy">
			<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

		</form>

	</div>
	<script type="text/javascript">
		function edit(id,name,description,status)
		{	
			document.getElementById('storeForm').style.display="none";
			document.getElementById('updateForm').style.display="block";

			document.getElementById('name').value = name;
			document.getElementById('description').value = description;
			document.getElementById('status').value = status;
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