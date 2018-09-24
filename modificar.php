<!DOCTYPE html>
<html>
	<head>
	<script src="/object/jquery/jquery-3.2.1.min.js"></script>
	<script src="/object/js/bootstrap.bundle.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/object/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!-- Load icon library
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
	<style>
		body {
		    font-family: Arial;
		}

		* {
		    box-sizing: border-box;
		}

		form.example input[type=text] {
		    padding: 10px;
		    font-size: 17px;
		    border: 1px solid grey;
		    float: left;
		    width: 80%;
		    background: #f1f1f1;
		}

		form.example button {
		    float: left;
		    width: 20%;
		    padding: 10px;
		    background: #2196F3;
		    color: white;
		    font-size: 17px;
		    border: 1px solid grey;
		    border-left: none;
		    cursor: pointer;
		}

		form.example button:hover {
		    background: #0b7dda;
		}

		form.example::after {
		    content: "";
		    clear: both;
		    display: table;
		}

	</style>
	<meta charset="utf-8" />
	<title>
		Stock
	</title>
	</head>
	<body>
	<body>
		<?php
			require('Conectar.php');
			$pdo = conectar();

			//Consultamos los datos actuales del socio:
			$consulta=$pdo->prepare("SELECT nombre, apellido, DNI FROM socios WHERE id_socio=:numeroRecibido");

			//Vinculamos el parámetro :numeroRecibido con el id recibido por GET:
			$consulta->bindValue(':numeroRecibido',$_GET['id']);

			$consulta->execute();
			$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

			//Armamos un formulario para que el usuario ingrese los nuevos datos:
			echo '<form action="guardarModif.php" method="post">';
			echo "<input name='numero' type='hidden' value='{$_GET['id']}'>";
			echo "Nombre: <input type='text' name='nombre' value='{$datos[0]['nombre']}' required><br>";
			echo "Apellido: <input type='text' name='apellido' value='{$datos[0]['apellido']}' required><br>";
			echo "DNI: <input name='DNI' type='number' value='{$datos[0]['DNI']}' min=7000000 required><br><br>";
			echo '<input type="submit" value="Modificar datos" class="btn btn btn-primary">';
			echo '</form>';
		?>
			<br> <br> <a href="crud.php" class="btn btn btn-primary"> Cancelar </a>
	</body>
</html>

