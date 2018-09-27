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
		Alta, Baja y modificación
	</title>
	</head>
	<body>

		<!-- Navbar -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; z-index: 1071; top: 0;">
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
						require('Conectar.php');
						$pdo = conectar();
						//La función conectar() está definida en Conectar.php, y conecta a la BD, 
						//retornando un objeto de clase PDO con la conexión.

						$consulta = $pdo->prepare("SELECT socios.nombre as socio, socios.apellido, socios.DNI, socios.id, socio_actividad.actividad_id, actividades.nombre as actividades FROM socios LEFT JOIN socio_actividad ON socios.id = socio_actividad.socio_id LEFT JOIN actividades ON socio_actividad.actividad_id = actividades.id;");

						//Aqui no hay parámetros, puede ejecutarse esta consulta con
						// $pdo->query(), lo omitimos por brevedad.

						$consulta -> execute();
						$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

						//Mostramos los resultados en una tabla:
						echo '<table class="table table-bordered table-sm table-hover table-striped" style="text-align:center;">
								<thead class="thead-dark" style="text-align:center";>
									<tr>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido</th>
										<th scope="col">DNI</th>
										<th scope="col">Actividad </th>
										<th scope="col">Editar</th>
										<th scope="col">Borrar</th>
									</tr>
								</thead>
								<tbody>';
									foreach ($resultado as $elSocio) {
									    echo '<tr>';
									    echo '<td>'. $elSocio['socio']. '</td>';
									    echo '<td>'. $elSocio['apellido'] .'</td>';
									    echo '<td style="text-align=center">'. $elSocio['DNI'] .'</td>';
									    echo '<td>';
									   	if ($elSocio['actividades']==null) {
									    	echo 'Sin asignar </td>';
									    	}
									    else {
									    	echo $elSocio['actividades'] .'</td>'; 
									    }

									    //Celda con el link para editar:

									    echo '<td>
									    		<a href="modificar.php?id='.$elSocio['id'].'">
									    			<button class="btn btn-info">
										    			<i class="far fa-edit"></i>
									    			</button>
									    		</a>
									    	  </td>';
									   	/*
									    echo '<td>
									     <th scope="col">Modificación</th> 
									    		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
									    			<i class="fas fa-plane-departure"></i>
											  			Test
												</button>
												<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">
												        	Eliminar Socio
												        </h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												        ¿Está seguro que desea borrar al socio?
												        Esto es irreversible
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
												        <button type="button" class="btn btn-danger" data-href="baja.php?id='.$elSocio['id_socio'].'"> Borrar
												        </button>
												      </div>
												    </div>
												  </div>
												</div>
											  </td>';
										*/

									    //Celda con el link para eliminar:
									    echo '<td>
									    		<a href="baja.php?id='.$elSocio['id'].'">
									    			<button class="btn btn-danger">
										    			<i class="far fa-trash-alt"></i>	
										    		</button>
									    		</a>
									    	 </td>
									   	</tr>';
									}
								echo '</tbody>
							  </table>';
					?>
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
