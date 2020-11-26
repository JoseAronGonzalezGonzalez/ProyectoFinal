<?php 
	include "../app/CategoryController.php";
	$CategoryController =new CategoryController();
		$categories = $CategoryController->get();

	//echo json_encode($categories);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Categories</title>
	<style type="text/css">
		}
		table, th, td{
			border: 1px solid black;
			border-collapse: collapse;
		}

		#uptadeForm{

			display: none;
		}
	</style>
</head>
<body>
	<h1>
		Categories
		<?php if (isset($_SESSION) && isset($_SESSION['error'])): ?>
			<?php echo "<h3>La operacion se realizo con error: ".$_SESSION['error']."</h3>" ?>
			<?php unset($_SESSION['error'])?>
		<?php endif ?>
		<?php if (isset($_SESSION) && isset($_SESSION['success'])): ?>
			<?php echo "<h3>La operacion se realizo con exito: ".$_SESSION['success']."</h3>" ?>
			<?php unset($_SESSION['success'])?>
		<?php endif ?>
	</h1>
	<div>
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
			<?php foreach ($categories as $category): ?>
				<tr>
					<td>
						<?= $category["id"] ?>
					</td>
					<td>
						<?= $category["name"] ?>
					</td>
					<td>
						<?= $category["description"] ?>
					</td>
					<td>
						<button onclick="edit(<?=$category['id']?>,'<?=$category['name']?>','<?=$category['description']?>','<?=$category['status']?>')">
							Edit category
						</button>
						<button onclick="remove(<?=$category['id']?>)">
							Delete
						</button>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<form id="storeForm" action="../app/CategoryController.php" method="POST">
			 	<fieldset>
			 		<legend>
			 			Add category
			 		</legend>
			 		<label>
			 			name
			 		</label>
			 		<input type="text" name="name" required=""><br><br>
			 		<label>
			 			description
			 		</label>
			 		<textarea name="description" placeholder="write here" required=""></textarea><br><br>
			 		<label>
			 			status
			 		</label>
			 		<select name="status">
			 			<option>
			 				active
			 			</option>
			 			<option>
			 				inactive
			 			</option>
			 		</select><br><br>
			 		<button type="sumbit">Save Category</button>
			 		<input type="hidden" name="action" value="store">
			 	</fieldset>
			 </form>

		<form id="uptadeForm" action="../app/CategoryController.php" method="POST">
			 	<fieldset>
			 		<legend>
			 			edit category
			 		</legend>
			 		<label>
			 			name
			 		</label>
			 		<input type="text" name="name" required="" id="name"><br><br>
			 		<label>
			 			description
			 		</label>
			 		<textarea name="description" placeholder="write here" required="" id="description"></textarea><br><br>
			 		<label>
			 			status
			 		</label>
			 		<select name="status" id="status">
			 			<option>
			 				active
			 			</option>
			 			<option>
			 				inactive
			 			</option>
			 		</select><br><br>
			 		<button type="sumbit">Save Category</button>
			 		<input type="hidden" name="action" value="update" id="action">
			 		<input type="hidden" name="id" id="id">
			 	</fieldset>
			 </form>

		<form id="destroyForm" action="../app/CategoryController.php" method="POST">
			<input type="hidden" name="action" value="destroy">
			<input type="hidden" name="id" id="id_destroy">
		</form>

	</div>

	<script type="text/javascript">
		
		function  edit(id,name,description,status) {

			document.getElementById('storeForm').style.display="none";
			document.getElementById('uptadeForm').style.display="block";

			document.getElementById('name').value = name;
			document.getElementById('description').value = description;
			document.getElementById('status').value = status;
			document.getElementById('id').value = id;
		}

		function remove(id) {
			var confirm = prompt("Si quiere eliminar el registro, escriba :"+id);
			if (confirm == id) {

				document.getElementById('id_destroy').value = id;
				document.getElementById('destroyForm').submit();
			}
		}
	</script>
</body>
</html>