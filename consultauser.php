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

	<style>
		body {
		    font-family: Arial;
		}
	</style>

	<!-- Assign UTF-8 -->
	<meta charset="utf-8" />

	<title>
		Stock
	</title>
	</head>
	<body>
		<!-- Navbar -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0; z-index: 999;">
		    <a class="navbar-brand" href="#">
		    <img src="/object/images/CN_Logo_Black.jpg" width="50" height="30" class="d-inline-block align-top" alt="">
		    Logística del Club
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="FichasEmpleados.php">Personal</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="crud.php">Socios</a>
		      </li>
		    </ul>
		    <span class="navbar-text">
		    </span>
		  </div>
		</nav>


		<!-- Content -->

		<div class="container-fluid" style="margin-top: 3rem;">
			<div class="row flex-xl-nowrap">

				<!-- Left Sidebar -->

				<div class="col-12 col-md-3 col-xl-2 bd-sidebar" style="background-color: #fff;">
					<div class="container-fluid" style="color: #000; font-family: Arial;">
						helloworld!
						helloworld!
						helloworld!
						helloworld!
					</div>
				</div>

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" style="background-color:#fff;">

					<h1>Personal del Club</h1>

					<?php
						require('Conectar.php');
					?>
					<?php 
						//Nos conectamos a la BD

						$pdo = conectar();

						//Ejecuto la consulta
						$stmt = $pdo->prepare('SELECT nombre, apellido, DNI, labor FROM personales ORDER BY nombre asc');
						$stmt->execute();
						$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

						//defino el tamaño de la tabla
					   	$tamañorow = sizeof($row);
					   	
					   	//tabla
					   	echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center; margin-top: 2rem;">
					   			<thead class="thead-dark">
						   			<tr>
						   				<th scope="col">Nombre</th>
						   				<th scope="col">Apellido</th>
						   				<th scope="col">DNI</th>
						   				<th scope="col">Labor</th>
						   			</tr>
						   		</thead>';
					   	for ($i=0; $i < $tamañorow; $i++) { 
					   		$value = $row[$i];
					   		echo '<tr>';
					   		foreach ($value as $key => $asd) {
					   		 	echo '<td>'. $asd.'</td>';
					   		 } 
					   		echo '</tr>';
					   	}
					   	echo "</table> <br><br>";
					   	
					   	echo "<h1>Socios del Club</h1>";

					   	// Ejecuto Consulta
					   	$st = $pdo->prepare('SELECT nombre, apellido, DNI FROM socios ORDER BY nombre asc');
						$st->execute();
						$ro = $st->fetchAll(PDO::FETCH_ASSOC);

						//defino el tamaño de la tabla
					   	$tamañoro = sizeof($ro);

					   	//tabla
					   echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center; margin-top:2rem;">
					   			<thead class="thead-dark">
						   			<tr>
						   				<th scope="col">Nombre</th>
						   				<th scope="col">Apellido</th>
						   				<th scope="col">DNI</th>
						   			</tr>
						   		</thead>';
					   	for ($i=0; $i < $tamañoro; $i++) { 
					   		$valu = $ro[$i];
					   		echo '<tr>';
					   		foreach ($valu as $ke => $as) {
					   		 	echo '<td>'. $as.'</td>';
					   		 } 
					   		echo '</tr>';
					   	}
					   	echo "</table> <br><br>";
					?>

					<a href="index.html" class="btn btn-primary">Volver al inicio</a>

					<p id="demo">Son mas de las 12.30 y el pelado nos cago, nos clavo y nos cago el pelado!</p>

						<script>
						if (new Date().getHours() > 12 && new Date().getMinutes() > 30) {
						    document.getElementById("demo").innerHTML = "";
						}
						</script>


				</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Dar de alta a un nuevo socio 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="crud.php" style="color:#99979c"> 
								<i class="fa fa-edit" aria-hidden="true"></i> Editar socios
							</a> 
						</li>
						<li class="toc-entry toc-h2" style="margin-top: 3px;">
							<a href="index.html" style="color:#99979c;">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>
		
		</body>
</html>

