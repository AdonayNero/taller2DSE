<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Index</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="col-md-8 offset-md-2">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h2 class="display-4">Crud ejemplo para DSE 2022</h2>
		</div>
	</div>
<hr/>
<a href="add.html" class="btn btn-success">Nuevo Registro</a><br/><br/>

	<table class="table" width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Edad</td>
		<td>Correo</td>
		<td>Domicilio</td>
		<td>Conocido_por</td>
		<td>Actualizar</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nombres']."</td>";
		echo "<td>".$res['apellidos']."</td>";
		echo "<td>".$res['edad']."</td>";
		echo "<td>".$res['correo']."</td>";
		echo "<td>".$res['domicilio']."</td>";	
		echo "<td>".$res['conocido_por']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-primary btn-sm\">Editar</a> | <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Seguro de borrar el registro?')\">Eliminar</a></td>";		
	}
	?>
	</table>
</body>
</html>
