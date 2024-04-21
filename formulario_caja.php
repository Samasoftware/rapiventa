<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nueva caja</h1>
	<form method="post" action="nuevo_caja.php">
		<label for="codigo">Caja chica:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el monto">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>