<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM productos WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$talle=$_POST['talle'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];
		$cantidad=$_POST['cantidad'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($talle) && !empty($precio) && !empty($descripcion) && !empty($cantidad) )
			{
				$consulta_update=$con->prepare(' UPDATE productos SET
					nombre=:nombre,
					talle=:talle,
					precio=:precio,
					descripcion=:descripcion,
					cantidad=:cantidad
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':talle' =>$talle,
					':precio' =>$precio,
					':descripcion' =>$descripcion,
					':cantidad' =>$cantidad,
					':id' =>$id
				));
				header('Location: index.php');
			}
		}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Producto</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD DH</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="talle" value="<?php if($resultado) echo $resultado['talle']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">
				<input type="text" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="cantidad" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
