<!DOCTYPE html>
<html>
	<head>
	
	<!-- Load js files -->
	<script src="/object/jquery/jquery-3.2.1.min.js"></script>
	<script src="/object/js/bootstrap.bundle.js"></script>
	<script src="/object/js/chart.js"></script>

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

					$stmt = $pdo->prepare('SELECT * FROM personales');
					$stmt->execute();
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
					//defino el tamaño de la tabla
					$tamañorow = sizeof($row);

					echo '<div class="container" style="margin-bottom:2rem;">';
					echo "Hay un total de ".$tamañorow." personas trabajando en el club";
					echo '</div>';

					$st = $pdo->prepare('SELECT * FROM socios');
					$st->execute();
					$ro = $st->fetchAll(PDO::FETCH_ASSOC);
					//defino el tamaño de la tabla
					$tamañoro = sizeof($ro);

					echo '<div class="container" style="margin-bottom:2rem;">';
					echo "Hay un total de ".$tamañoro." personas asociadas al club";
					echo '</div>';

					echo '<div class="container-fluid" style="width: 500px; height: 800px;">

						<canvas id="myChart"></canvas>

						<script>
						var ctx = document.getElementById("myChart");
						var myChart = new Chart(ctx, {
						    type: "bar",
						    data: {
						        labels: ["Socios", "Trabajadores"],
						        datasets: [{
						            label: "Personas",
						            data: ['.$tamañoro.','.$tamañorow.'],
						            backgroundColor: [
						                "rgba(255, 99, 132, 0.2)",
						                "rgba(255, 159, 64, 0.2)",
						            ],
						            borderColor: [
						                "rgba(255,99,132,1)",
										"rgba(255, 159, 64, 1)",
						            ],
						            borderWidth: 1
						       		 }]
						    },
						    options: {
						        scales: {
						            yAxes: [{
						                ticks: {
						                    beginAtZero:true
						                }
						            }]
						        }
						    }
						});
						</script>

					</div>';

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

