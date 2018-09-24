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
		Alta
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

		<div class="container" align="center">
			<h1>Alta de Socios</h1>

		<form method="post" action="alta.php">
			<div class="input-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" value="" required minlength="3">
			</div>
			<div class="input-group">
				<label>Apellido:</label>
				<input type="text" name="apellido" value="" required minlength="3">
			</div>
			<div class="input-group">
				<label>Teléfono:</label>
				<input type="number" name="telefono" required minlength="2000000">
			</div>
			<div class="input-group">
				<label>DNI:</label>
				<input type="number" name="DNI" required min="10000000">
			</div>
			<div class="input-group">
				<label>Dirección:</label>
				<input type="text" name="direccion"  name="direccion" required minlength="8">
			</div>
			<div class="input-group">
				<label style="margin-right: 6rem;">Actividad:</label>
				<select name="actividad" style="text-align: center">
				    		<?php
				    			require ("Conectar.php")
				    		?>
				    		<?php
				    			$pdo = conectar();
				    			$st = $pdo->prepare('SELECT actividades.nombre, actividades.nivel FROM actividades ORDER BY nombre asc');
				    			$st -> execute();
				    			$ro = $st->fetchAll(PDO::FETCH_ASSOC);
				    			$tamañoro = sizeof($ro);
				    			for ($i=0; $i < $tamañoro; $i++) { 
							   		$valu = $ro[$i];
							   		echo '<option>';
							   		foreach ($valu as $ke => $as) {
							   		 	echo  $as.' ';
							   		 } 
							   		echo '</option>';
							   	}
				    		?>
				</select>
			</div>
			<div class="input-group">
				<button type="submit" class="btn btn-success" name="register_btn">Dar de Alta</button>
			</div>
		</form>
			<div class="card text-center" style="width: 20rem;">
			   <div class="card-body">
			    <p class="card-text">
			    	<a href="crud.php" class="btn btn btn-primary"> Volver a la página de socios </a>
			    </p>
			    <p class="card-text">
			    	<a href="index.html" class="btn btn btn-primary"> Volver al Inicio </a>
			    </p>
			  </div>
			</div>
		</div>
	</body>
</html>