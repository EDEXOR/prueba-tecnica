<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
// Conexion a la base de datos 
require_once("dbConnection.php");

?>
  <div class="jumbotron">
    <h1 class="display-3">Agregar personal</h1>
    <h3 class="lead">Completa el formulario</h3>
    <hr class="my-2">
    
	</div>
    <div class="container">
        <form action="addAction.php" method="POST">
       
        <div class="form-group">
            <label name="nombres" for="inputAddress">Nombres</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Nombres">
        </div>
        <div class="form-group">
            <label name="apellidos" for="inputAddress2">Apellidos</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apellidos">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label  for="inputCity">Pais</label>
            <input name="pais" type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
            <label for="inputState">Departamento</label>
            <input name="departamento" type="text" class="form-control" id="departamento">
            </div>
            <div class="form-group col-md-2">
            <label name="fecha" for="inputZip">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="inputZip">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
            <label for="seleccion">Area de trabajo</label>
            <select class="form-control" name="area" id="seleccion">
          <?php
            $areaas = mysqli_query($mysqli, "SELECT * FROM areas ORDER BY id DESC");
            while ($areas = mysqli_fetch_assoc($areaas)) {
                echo '<option value="'.$areas['id'].'">'.$areas['nombre_area'].'</option>';
            }
            ?>
          </select>
            </div>
        </div>
        <div class="form-group">
        <select class="form-control" name="sexo" id="seleccion">
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
        </div>
        <br><br>
        <input type="submit" value="Registrar" class="btn btn-primary">
        </form>
    </div>
	
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




