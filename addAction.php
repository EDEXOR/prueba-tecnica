<html>
<head>
	<title></title>
</head>

<body>
<?php

require_once("dbConnection.php");



	$nombres = mysqli_real_escape_string($mysqli, $_POST['nombres']);
	$apellidos = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
	$fecha = mysqli_real_escape_string($mysqli, $_POST['fecha']);
	$pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
	$departamento = mysqli_real_escape_string($mysqli, $_POST['departamento']);
	$area = mysqli_real_escape_string($mysqli, $_POST['area']);
	$sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		

	
		$result = mysqli_query($mysqli, "INSERT INTO personal (`id`, `nombres`, `apellidos`, `sexo`, `pais`, `departamento`, `fecha_nacimiento`, `email`, `area`) VALUES ('' ,'$nombres', '$apellidos', '$sexo', '$pais', '$departamento', '$fecha', '$email', '$area')");
	
		header('Location: index.php');
	
	
	
?>
</body>
</html>
