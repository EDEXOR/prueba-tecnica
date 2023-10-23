
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="js/funciones.js"></script>
    <link rel="stylesheet" href="css/estilo.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="jumbotron">
    <h1 class="display-3">Personal</h1>
    <h3 class="lead">Mantenimiento de personal</h3>
    <hr class="my-2">
    <p class="lead">
        <a class="btn btn-success" href="add.php" role="button">Agregar personal</a>
        <a class="btn btn-primary" href="report.php" role="button">Generar Reporte</a>
        <a class="btn btn-secondary" href="areas.php" role="button">Administrar areas</a>
    </p>
</div>

<?php
// Conexion a la base de datos 
require_once("dbConnection.php");

// Obteneos los datos y ordenamos
$result = mysqli_query($mysqli, "SELECT * FROM personal ORDER BY id DESC");
?>


<div class="container">
  <div class="row">
    <div class="col">
    <label for="texto_buscar">Buscar</label>
    <div class="input-group">
        
            <input type="text"  class="form-control"  placeholder="Nombre" id="texto_buscar"> 
            <input class="btn btn-outline-secondary" value="Buscar" onclick="buscar()" type="button"> 
    </div>
    </div>
    <div class="col">
    <label for="seleccion">Filtrar</label>
        <div class="input-group">
        
          <select class="form-control" name="" id="seleccion">
          <?php
            $areaas = mysqli_query($mysqli, "SELECT * FROM areas ORDER BY id DESC");
            while ($areas = mysqli_fetch_assoc($areaas)) {
                echo '<option value="'.$areas['id'].'">'.$areas['nombre_area'].'</option>';
            }
            ?>
          </select>
          <input class="btn btn-outline-secondary" value="Filtrar" onclick="filtrar()" type="button"> 
        </div>
    
    </div>
  </div>
  </div>
            
            <input class=" btn btn-secondary"  placeholder="Nombre" value="Mostrar todos los datos" onclick="mostrar_todos()" id="mostrar" type="button" style="display:none;">
    

    <br>
	<table class="table" width='80%' border=0 id="tabla">
    <thead>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Nombre</strong></td>
			<td><strong>Edad</strong></td>
			<td><strong>Fecha de nacimiento</strong></td>
			<td><strong>Sexo</strong></td>
			<td><strong>Pais</strong></td>
			<td><strong>Departamento</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Area</strong></td>
            <td><strong>Acción</strong></td>
            <td><strong></strong></td>

		</tr>
    </thead>
		<?php

		while ($res = mysqli_fetch_assoc($result)) {

		 $area = mysqli_query($mysqli, "SELECT nombre_area FROM areas WHERE id=".$res['area']." ORDER BY id DESC");
			 
		 while ($resp = mysqli_fetch_assoc($area)) {
					$area_nombre=$resp['nombre_area'];
                    
		}
			$tiempo = strtotime($res['fecha_nacimiento']); 
			$ahora = time(); 
			$edad = ($ahora-$tiempo)/(60*60*24*365.25); 
			$edad = floor($edad); 

            if($res['sexo']==1){
                $sexo="Masculino";
            }
            else{
                $sexo="Femenino";
            }
			
			echo "<tr>";
			echo "<td>".$res['nombres']." ".$res['apellidos']."</td>";
			echo "<td>".$edad."</td>";
			echo "<td>".$res['fecha_nacimiento']."</td>";
			echo "<td>".$sexo."</td>";	
			echo "<td>".$res['pais']."</td>";	
			echo "<td>".$res['departamento']."</td>";	
			echo "<td>".$res['email']."</td>";
			echo "<td>".$area_nombre."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | 
			<a href='#' onClick='borrar($res[id])'>Borrar</a></td>";
		}
		?>
	</table>
</body>
</html>
