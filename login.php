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
		Login
	</title>
	</head>
	<body>
		<?php
			require ("Conectar.php")
		?>
		
		<h1> Registro </h1>

		<form method="post" action="register.php">
			<div class="input-group">
				<label>Usuario</label>
				<input type="text" name="username" value="">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="">
			</div>
			<div class="input-group">
				<label>Contraseña</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirme contraseña</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" class="btn btn-success" name="register_btn">Registrar</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>

		<div class="jumbotron">
		  <h1 class="display-4">Registrate</h1>
		  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		  <hr class="my-4">
			  <div class="input-group">
					<label>Usuario</label>
					<input type="text" name="username" value="">
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="email" name="email" value="">
				</div>
				<div class="input-group">
					<label>Contraseña</label>
					<input type="password" name="password_1">
				</div>
				<div class="input-group">
					<label>Confirmá tu contraseña</label>
					<input type="password" name="password_2">
				</div>
				<div class="input-group">
					<button type="submit" class="btn btn-success" name="register_btn">Registrar</button>
				</div>
		  <p class="lead">
		    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
		  </p>
		</div>

	</body>
</html>