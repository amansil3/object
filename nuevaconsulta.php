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

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0;">
		    <a class="navbar-brand" href="#">
		    <img src="/object/images/CN_logo_black.jpg" width="80" height="30" class="d-inline-block align-top" alt="">
		    Club de Natación
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

				<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
					helloworld!
					helloworld!
					helloworld!
					helloworld!
				</div>

				<!-- Main body -->

				<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
					<?php
					//conecto a la BD
					require('Conectar.php');
					$pdo = conectar();

					//Preparamos la consulta
					
					$consulta=$pdo->prepare("SELECT socios.nombre as socio, socios.apellido, socios.DNI, socio_actividad.actividad_id, actividades.nombre FROM socios JOIN socio_actividad ON socios.id_socio = socio_actividad.socio_id JOIN actividades ON socio_actividad.actividad_id = actividades.id_actividad ;");
						$consulta -> execute();
						$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
						//Mostramos los resultados en una tabla:
						echo '<table class="table-striped table-hover table-sm table-bordered">
								<tr>
									<thead class="thead-dark">
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col"> DNI </th>	
										<th scope="col">Actividad</th>
									</thead>
								</tr>
									<tbody>';
						foreach ($resultado as $elSocio) {
						    echo '<tr>';
						    echo '<td>'.$elSocio['socio'].'</td>';
						    echo '<td>'.$elSocio['apellido'].'</td>';
						    echo '<td>'.$elSocio['DNI'].'</td>';
						    echo '<td>'.$elSocio['nombre'].'</td>';
						    echo '</tr>';
						}
						echo '</tbody></table><br><br>';
						
					?>
					<a href="index.html" class="btn btn-primary">Volver al inicio</a>

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

