<?php include_once "encabezado.php" ?>











<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM caja order by idcaja desc;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Cajas</h1>
		<div>
			<a class="btn btn-success" href="./formulario_caja.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
				
					
					<th>Fecha</th>
					<th>Usuario</th>
					<th>Punto</th>
					<th>Estado</th>
					<th>Caja chica</th>
					<th>Ventas</th>
					<th>Detalles</th>
					<th>Cerrar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->idcaja ?></td>
					
					<td><?php echo $producto->fecha ?></td>
					<td><?php echo $producto->usuario ?></td>
					<td><?php echo $producto->punto ?></td>
					<td><?php echo $producto->estado ?></td>
					<td><?php echo $producto->caja_chica ?></td>
					<td><?php echo "falta" ?></td>

<td>




<?php
date_default_timezone_set("America/Lima");
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("select * from (
	SELECT COUNT(efectivo) AS operaciones,'EFECTIVO' as forma_pago,sum(efectivo) as total FROM ventas where fecha like '%".date("Y-m-d")."%' and efectivo<>0
	and caja='$producto->idcaja'
	union all
	SELECT COUNT(tarjeta) AS operaciones,'TARJETA' as forma_pago,sum(tarjeta) as total FROM ventas where fecha like '%".date("Y-m-d")."%' and tarjeta<>0
	and caja='$producto->idcaja'
	union all
	SELECT COUNT(yape) AS operaciones,'YAPE' as forma_pago,sum(yape) as total FROM ventas where fecha like '%".date("Y-m-d")."%' and yape<>0
	and caja='$producto->idcaja'
	union all
	SELECT COUNT(cortesia) AS operaciones,'CORTESIA' as forma_pago,sum(cortesia) as total FROM ventas where fecha like '%".date("Y-m-d")."%' and cortesia<>0
	and caja='$producto->idcaja'
	) caja;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>



	
	<table class="table table-bordered">
			<thead>
				<tr>
					<th>OPERACIONES</th>
					<th>FORMA DE PAGO</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>

					<td><?php echo $producto->operaciones ?></td>
					<td><?php echo $producto->forma_pago ?></td>
					<td><?php echo $producto->total ?></td>

				</tr>
				<?php } ?>
			</tbody>
		</table>





</td>


					
					<td><a class="btn btn-danger" href="<?php echo "cerrar_caja.php?id=" . $producto->idcaja?>"><i class="fa fa-window-close"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>












<?php include_once "pie.php" ?>