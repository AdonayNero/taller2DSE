<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
	$edad = mysqli_real_escape_string($mysqli, $_POST['edad']);
	$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
	$domicilio = mysqli_real_escape_string($mysqli, $_POST['domicilio']);
	$conocido_por = mysqli_real_escape_string($mysqli, $_POST['conocido_por']);	
	
	// checking empty fields
	if(empty($nombres) || empty($apellidos) || empty($edad) || empty($correo) || empty($domicilio) || empty($conocido_por)) {
			
		if(empty($nombres)) {
			echo "<font color='red'>nombres field is empty.</font><br/>";
		}
		
		if(empty($apellidos)) {
			echo "<font color='red'>apellidos field is empty.</font><br/>";
		}
		
		if(empty($edad)) {
			echo "<font color='red'>edad field is empty.</font><br/>";
		}

		if(empty($correo)) {
			echo "<font color='red'>correo field is empty.</font><br/>";
		}

		if(empty($domicilio)) {
			echo "<font color='red'>domicilio field is empty.</font><br/>";
		}
		
		if(empty($conocido_por)) {
			echo "<font color='red'>conocido_por field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET nombres='$nombres',apellidos='$apellidos',edad='$edad',correo='$correo',domicilio='$domicilio',conocido_por='$conocido_por' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombres = $res['nombres'];
	$apellidos = $res['apellidos'];
	$edad = $res['edad'];
	$correo = $res['correo'];
	$domicilio = $res['domicilio'];
	$conocido_por = $res['conocido_por'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body class="col-md-4 offset-md-4">
	<a href="index.php" class="btn btn-secondary">Regresar</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<div class="form-group">
			<label for="Nombres">Nombres</label>
			<input type="text" name="nombres" class="form-control" id="nombres" value="<?php echo $nombres;?>" placeholder="Ingresar los nombres">
		</div>
		<div class="form-group">
			<label for="apellidos">Apellidos</label>
			<input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php echo $apellidos;?>" placeholder="Ingresar los apellidos">
		</div>
		<div class="form-group">
			<label for="edad">Edad</label>
			<input type="number" name="edad" class="form-control" id="edad" value="<?php echo $edad;?>" placeholder="Ingresar la edad">
		</div>
		<div class="form-group">
			<label for="correo">Correo</label>
			<input type="email" name="correo" class="form-control" id="correo" value="<?php echo $correo;?>" placeholder="Ingresar tu correo">
		</div>
		<div class="form-group">
			<label for="domicilio">Domicilio</label>
			<input type="text" name="domicilio" class="form-control" id="domicilio" value="<?php echo $domicilio;?>" placeholder="Ingresar el domicilio">
		</div>
		<div class="form-group">
			<label for="conocido_por">Conocido por...</label>
			<input type="text" name="conocido_por" class="form-control" id="conocido_por" value="<?php echo $conocido_por;?>" placeholder="Ingresar el conocido por">
		</div>
		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		<hr/>
		<button type="submit" name="update" value="Actualizar registro" class="btn btn-primary">Actualizar</button>
	</form>
</body>
</html>
