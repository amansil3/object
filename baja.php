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
	}
	</style>
	<meta charset="utf-8" />
	<title>
		Stock
	</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; z-index: 1071; top: 0;">
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
			<?php
			//conecto a la BD
			require('Conectar.php');
			$pdo = conectar();

			//Preparamos la eliminacion
			$eliminacion=$pdo->prepare("DELETE FROM socios WHERE id_socio=:numeroRecibido");

			//Vinculamos el parámetro :numeroRecibido con el id recibido por GET:
			$eliminacion->bindValue(':numeroRecibido',$_GET['id']);

			//Ejecutamos la eliminación, mostrando un mensaje de éxito o error según corresponda:
			if($eliminacion->execute()) {
			    echo "Socio eliminado correctamente <br><br>";
			}
			else {
			    echo "Error al eliminar al socio <br><br>";
			}
			?>
			<a href="crud.php"> Volver a la pagina de socios </a>
		</body>
</html>

