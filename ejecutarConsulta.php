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
   	echo '<table border=1><tr><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Labor</th></tr>';
   	for ($i=0; $i < $tamañorow; $i++) { 
   		$value = $row[$i];
   		echo '<tr>';
   		foreach ($value as $key => $asd) {
   		 	echo '<td>'. $asd.'</td>';
   		 } 
   		echo '</tr>';
   	}
?>

