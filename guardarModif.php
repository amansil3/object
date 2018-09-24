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
		<?php
			require('Conectar.php');
			$pdo = conectar();
			//Preparamos la sentencia de modificacion:
			$modificacion=$pdo->prepare("UPDATE socios,socio_actividad SET
			                                nombre = :nombre, apellido = :apellido, DNI = :DNI
			                                WHERE id_socio=:id_socio");
			//Vinculamos los parámetros con los datos recibidos por POST:
			$modificacion->bindValue(':nombre',$_POST['nombre']);
			$modificacion->bindValue(':apellido',$_POST['apellido']);
			$modificacion->bindValue(':DNI',$_POST['DNI']);
			$modificacion->bindValue(':id_socio', $_POST['numero']);
			//Ejecutamos la modificación, mostrando un mensaje de éxito o error según corresponda:
			if($modificacion->execute()) {
			    echo "Datos modificados correctamente";
			}
			else {
			    echo "Error al modificar los datos del socio";
			}
		?>
	</body>
</html>

