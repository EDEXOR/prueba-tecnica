<html>
<head>
	<title></title>
</head>

<body>
<?php

require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
	$fecha = mysqli_real_escape_string($mysqli, $_POST['fecha']);
	$pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
	$departamento = mysqli_real_escape_string($mysqli, $_POST['departamento']);
	$area = mysqli_real_escape_string($mysqli, $_POST['area']);
	$sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		

	if (empty($nombres) || empty($fecha) || empty($email)) {
		if (empty($nombres)) {
			echo "<font color='red'>Nombre esta vacio</font><br/>";
		}
		
		if (empty($fecha)) {
			echo "<font color='red'>Pais esta vacio</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Fecha esta vacio</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO personal (`nombres`, `apellidos`, `sexo`, `pais`, `departamento`, `fecha_nacimiento`, `email`, `area`) VALUES ('$nombres', '$apellidos', '$sexo', '$pais', '$fecha', '$email', '$area')");
		
		// Display success message
	
		header("Location: index.php");
	}
}
?>
</body>
</html>
