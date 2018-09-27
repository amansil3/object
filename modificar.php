<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/object/jquery/jquery-3.2.1.min.js"></script>
	<script src="/object/js/bootstrap.bundle.js"></script>

	<!-- Load CSS & Icons library -->
	<link rel="stylesheet" href="/object/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Responsive design for mobile navigation -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />


	<style>
		* { margin: 0px; padding: 0px; }
		body {
			font-size: 120%;
			background: #F8F8FF;
		}
		.header {
			width: 40%;
			margin: 50px auto 0px;
			color: white;
			background: #5F9EA0;
			text-align: center;
			border: 1px solid #B0C4DE;
			border-bottom: none;
			border-radius: 10px 10px 0px 0px;
			padding: 20px;
		}
		form, .content {
			width: 40%;
			margin: 0px auto;
			padding: 20px;
			border: 1px solid #B0C4DE;
			background: white;
			border-radius: 0px 0px 10px 10px;
		}
		.input-group {
			margin: 10px 0px 10px 0px;
		}
		.input-group label {
			display: block;
			text-align: left;
			margin: 3px;
		}
		.input-group input {
			height: 30px;
			width: 93%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
		#user_type {
			height: 40px;
			width: 98%;
			padding: 5px 10px;
			background: white;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
		.btn {
			padding: 10px;
			font-size: 15px;

			border: none;
			border-radius: 5px;
		}
		.error {
			width: 92%; 
			margin: 0px auto; 
			padding: 10px; 
			border: 1px solid #a94442; 
			color: #a94442; 
			background: #f2dede; 
			border-radius: 5px; 
			text-align: left;
		}
		.success {
			color: #3c763d; 
			background: #dff0d8; 
			border: 1px solid #3c763d;
			margin-bottom: 20px;
		}
		.profile_info img {
			display: inline-block; 
			width: 50px; 
			height: 50px; 
			margin: 5px;
			float: left;
		}
		.profile_info div {
			display: inline-block; 
			margin: 5px;
		}
		.profile_info:after {
			content: "";
			display: block;
			clear: both;
		}
	</style>

	<title>
		Modificación
	</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0;">
		    <a class="navbar-brand" href="#">
		    <img src="/object/images/cn.png" width="80" height="30" class="d-inline-block align-top" alt="">
		    Club de Natación
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="Consulta.php">Personal</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="crud.php">Socios</a>
		      </li>
		    </ul>
		    <span class="navbar-text">
		    </span>
		  </div>
		</nav>
		
		<!-- Form -->
		<?php
			require('Conectar.php');
		?>
		<?php
			$pdo = conectar();

			//Consultamos los datos actuales del socio:
			$consulta=$pdo->prepare("SELECT nombre, apellido, DNI FROM socios WHERE id=:numeroRecibido");

			//Vinculamos el parámetro :numeroRecibido con el id recibido por GET:
			$consulta->bindValue(':numeroRecibido',$_GET['id']);

			$consulta->execute();
			$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

			//Armamos un formulario para que el usuario ingrese los nuevos datos:
			echo '<div class="container" align="center">
				<h1>Alta de Socios</h1>';
				echo '<form action="guardarModif.php" method="post">';
				echo "<input name='numero' type='hidden' value='{$_GET['id']}'>";
				echo '<div class="input-group">';
					echo "<label> Nombre: </label>
						<input type='text' name='nombre' value='{$datos[0]['nombre']}' required>
					</div>";
				echo '<div class="input-group">';
					echo "<label> Apellido: </label>
						<input type='text' name='apellido' value='{$datos[0]['apellido']}' required>
						</div>";
				echo '<div class="input-group">';
					echo "<label> DNI: </label>
						<input name='DNI' type='number' value='{$datos[0]['DNI']}' min=7000000 required>
					</div>";
				echo '<input type="submit" value="Modificar datos" class="btn btn btn-primary">';
				echo '<a href="crud.php" class="btn btn btn-primary"> Cancelar </a>';
				echo '</form>
			</div>';

		?>
			
	</body>
</html>

