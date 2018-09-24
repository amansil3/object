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
		Ficha de Empleados
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

				<h1>Personal del Club</h1> <br>
				<?php
					require('Conectar.php');
				?>
				<?php 
					//Nos conectamos a la BD
					$pdo = conectar();
					//Ejecuto la consulta
					$stmt = $pdo->prepare('SELECT nombre, apellido, DNI, labor FROM personales');
					$stmt->execute();
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
					//defino el tamaño de la tabla
				   	$tamañorow = sizeof($row);
				   	//tabla
				   	echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
				   			<thead class="thead-dark">
					   			<tr>
					   				<th scope="col"> Nombre </th>
					   				<th scope="col"> Apellido </th>
					   				<th scope="col"> DNI </th>
					   				<th scope="col"> Labor </th>
					   				<th scope="col"> Ficha </th>
					   				<th scope="col"> Editar </th>
					   				<th scope="col"> Eliminar </th>
					   			</tr>
				   			</thead>
				   			<tbody>';
				   	for ($i=0; $i < $tamañorow; $i++) { 
				   		$value = $row[$i];
				   		echo '<tr>';
				   		foreach ($value as $key => $asd) {
				   		 	echo '<td style>'. $asd.'</td>';
				   		 } 
				   		echo '</td>';
				   		echo '<th>
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-expand-arrows-alt"></i></button>
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h4 class="modal-title">'.$value['nombre'].' '.$value['apellido'].'</h4>
									      </div>
									      <div class="modal-body">
									    	  <div class="container-fluid">
											 	<div class="row">
											 		<div class="col-md-6"> Foto
														<div id="carouselauto1" class="carousel slide" data-ride="carousel">
														  <div class="carousel-inner">
														    <div class="carousel-item active">
														      <img class="d-block w-100" src="/object/images/corolla.jpg" alt="First slide">
														    </div>
														    <div class="carousel-item">
														      <img class="d-block w-100" src="/object/images/corolla1.jpg" alt="Second slide">
														    </div>
														    <div class="carousel-item">
														      <img class="d-block w-100" src="/object/images/corolla2.jpg" alt="Third slide">
														    </div>
														  </div>
														  <a class="carousel-control-prev" href="#carouselauto1" role="button" data-slide="prev">
														    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
														    <span class="sr-only">Previous</span>
														  </a>
														  <a class="carousel-control-next" href="#carouselauto1" role="button" data-slide="next">
														    <span class="carousel-control-next-icon" aria-hidden="true"></span>
														    <span class="sr-only">Next</span>
														  </a>
														</div>
													</div>
													<div class="col-md-6 justify-content-start"> Datos
														<ul class="section-nav" style="list-style: none;">
															<li class="toc-entry toc-h2">
																Nombre: '.$value['nombre'].'
															</li>
															<li class="toc-entry toc-h2">
																Apellido: '.$value['apellido'].'
															</li>
															<li class="toc-entry toc-h2">
																DNI: '.$value['DNI'].'
															</li>
															<li class="toc-entry toc-h2">
																Fecha Nacimiento: '.$value['nombre'].'
															</li>
															<li class="toc-entry toc-h2">
																Fecha Ingreso: '.$value['nombre'].'
															</li>
														</ul>
														</div>
													</div>
												</div>
											</div>

									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      </div>
									    </div>
									  </div>
									</div>
								</th>
								<th> 
									<a href="EditFicha.php">
										<button class="btn btn-info btn-sm">
											<i class="fas fa-user-edit">
											</i>
										</button>
									</a>
								</th>
								<th> 
									<a href="EliminarFicha.php">
										<button class="btn btn-danger btn-sm">
											<i class="fa fa-user-times">
											</i>
										</button>
									</a>
								</th>';
				   	}
				   	echo "</tbody> </table>";
				?>

				<a href="index.html" class="btn btn-primary" style="margin-top: 2rem;">Volver al inicio</a>

				</main>

				<!-- Right Sidebar -->

				<div class="d-none d-xl-block col-xl-2 bd-toc">
					<ul class="section-nav" style="list-style: none; margin-top: 4rem;">
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-plus" aria-hidden="true"></i> Sumar un nuevo trabajador 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="formAlta.php" style="color:#99979c"> 
								<i class="fa fa-edit" aria-hidden="true"></i> Editar fichas 
							</a> 
						</li>
						<li class="toc-entry toc-h2">
							<a href="index.html" style="color:#99979c">
								<i class="fa fa-home" aria-hidden="true"></i> Volver al inicio
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

	</body>
</html>

