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
				require('Conectar.php');
			?>
			<?php
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$DNI = $_POST['DNI'];
				$telefono = $_POST['telefono'];
				$direccion = $_POST['direccion'];
				$actividad = $_POST['actividad'];

				//Conecto a la BD
				$pdo = conectar();
				//Preparo la sentencia INSERT, con dos parámetros, a los que llamamos :a, :b, :c, :d, :e, :f :
				$insercion = $pdo -> prepare("INSERT INTO socios (nombre, apellido, telefono, DNI, direccion) VALUES (:a, :b, :c, :d, :e);");

				//Le asigno valor a los parámetros :a , :b, :c, :d, :e,:
				$insercion -> bindValue(':a',$nombre);
				$insercion -> bindValue(':b',$apellido);
				$insercion -> bindValue(':c',$telefono);
				$insercion -> bindValue(':d',$DNI);
				$insercion -> bindValue(':e',$direccion);
				
				// Preparo la sentencia INSERT para tabla pivot:
				$activityselect = $pdo -> prepare("INSERT INTO socio.actividad (socio_id, actividad_id) 
					VALUES (:f);");

				// Verifico DNI mediante que no exista el socio mediante un Select:
				$socioexiste = $pdo -> prepare("SELECT id from socios WHERE DNI = $DNI");
				$socioexiste -> execute ();
				$row1 = $socioexiste->fetchAll(PDO::FETCH_ASSOC);

				// Asigno valor a los parámetros :f
				$activityselect -> bindValue(':f',$actividad);
				$activityselect -> execute ();
				//Ejecutamos la sentencia preparada antes:
			   	//if ($row1 == true){
				if ($insercion -> execute() ) {
				 //Si la inserción fue exitosa:
					echo "El socio fue agregado."."<br><br>";
					if ($activityselect -> execute() ){
					   	echo "Funciono el segundo select";
					    }
					else{
					  	echo "No funciono el segundo select";
					}
				}
				else {
				    echo "Error al agregar al socio";
				}
					//else {
					//	echo "El socio ingresado ya existe. ";
					//}	
				
			?>
			<a href="crud.php" class="btn btn btn-primary"> Volver a la página de socios </a>
			<a href="index.html" class="btn btn btn-primary"> Volver al Inicio </a>
		</body>
</html>

