<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$talle=$_POST['talle'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];
		$cantidad=$_POST['cantidad'];

		if(!empty($nombre) && !empty($talle) && !empty($precio) && !empty($descripcion) && !empty($cantidad) )
		{
				$consulta_insert=$con->prepare('INSERT INTO productos(nombre,talle,precio,descripcion,cantidad) VALUES(:nombre,:talle,:precio,:descripcion,:cantidad)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':talle' =>$talle,
					':precio' =>$precio,
					':descripcion' =>$descripcion,
					':cantidad' =>$cantidad
				));
				header('Location: index.php');
			}
		else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD DH</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="talle" placeholder="talle" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="precio" placeholder="Teléfono" class="input__text">
				<input type="text" name="descripcion" placeholder="descripcion" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="cantidad" placeholder="cantidad" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
