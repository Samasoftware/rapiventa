<?php include_once "encabezado.php" ?>
<?php
date_default_timezone_set("America/Lima");
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, ventas.cliente, ventas.forma_pago, ventas.numero,GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad, '..', productos_vendidos.precio, '..', productos_vendidos.importe SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto where fecha like '%".date("Y-m-d")."%' GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<script>
		function printTiketDenuevo(cliente,detalles,total,numero,fecha) { 
			var a = window.open('./ticket.php?cliente='+cliente+'&detalles='+detalles+'&total='+total+'&numero='+numero+'&fecha='+fecha+'', 'PRINT', 'height=500, width=500'); 
			a.print();
			return true;
		}

	</script>



	<div class="col-xs-12">
		<h1>Ventas</h1>
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
					<th>FORMA PAGO</th>
					<th>PRODUCTOS</th>
					<th>TOTAL</th>
					<th>ANULAR</th>
					<th>IMPRIMIR</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td><?php echo $venta->cliente ?></td>
					<td><?php echo $venta->forma_pago ?></td>


					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Importe</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[3] ?></td>
									<td><?php echo $producto[4] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>


					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
					<td><a class="btn btn-success" onClick="javascript:printTiketDenuevo('<?php echo $venta->cliente ?>','<?php echo $venta->productos ?>','<?php echo $venta->total ?>','<?php echo $venta->numero ?>','<?php echo $venta->fecha ?>');"><i class="fa fa-print"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>