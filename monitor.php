<?php include_once "encabezado.php" ?>
<?php
date_default_timezone_set("America/Lima");
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, ventas.cliente, ventas.forma_pago, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad, '..', productos_vendidos.detalles SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto where fecha like '%".date("Y-m-d")."%' and estado = 'PENDIENTE' AND forma_pago != 'ANULADO' GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<head>
<meta http-equiv="refresh" content="10">
</head> 

	<div class="col-xs-12">
		<h1>Pedidos</h1>
	<h1>
	<?php
	date_default_timezone_set("America/Lima");    
	echo date("d-m-Y")
	?>
	</h1>

		<br>
		<table class="table table-bordered" style="width:auto;">
			<thead>
				<tr>
					<th>COMANDA</th>
					<th>FECHA</th>
					<th>CLIENTE</th>

					<th>PRODUCTOS</th>

					<th>LISTO</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td><?php echo $venta->cliente ?></td>

					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Descripción</th>
									<th>Cantidad</th>
									<th>Detalles</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[3] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>

					<td><a class="btn btn-danger" href="<?php echo "despacharVenta.php?id=" . $venta->id?>">LISTO</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>