<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
	$edad = mysqli_real_escape_string($mysqli, $_POST['edad']);
	$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
	$domicilio = mysqli_real_escape_string($mysqli, $_POST['domicilio']);
	$conocido_por = mysqli_real_escape_string($mysqli, $_POST['conocido_por']);
		
	// checking empty fields
	if(empty($nombres) || empty($apellidos) || empty($edad) || empty($correo) || empty($domicilio) || empty($conocido_por)) {
				
		if(empty($nombres)) {
			echo "<font color='red'>nombres campo vacio</font><br/>";
		}
		
		if(empty($apellidos)) {
			echo "<font color='red'>apellidos campo vacio</font><br/>";
		}
		
		if(empty($edad)) {
			echo "<font color='red'>edad campo vacio</font><br/>";
		}

		if(empty($correo)) {
			echo "<font color='red'>correo campo vacio</font><br/>";
		}

		if(empty($domicilio)) {
			echo "<font color='red'>domicilio campo vacio</font><br/>";
		}
		
		if(empty($conocido_por)) {
			echo "<font color='red'>conocido_por campo vacio</font><br/>";
		}
		
		
		//link to the previous papellidos
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(nombres,apellidos,edad,correo,domicilio,conocido_por) VALUES('$nombres','$apellidos','$edad','$correo','$domicilio','$conocido_por')");
		
		//display success messapellidos
		header("Location:index.php");
	}
}
?>
</body>
</html>
