<?php 
session_start();
include_once "encabezado.php";
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
	<script>
		function printTiket() { 
			
			// selecionar los elemtos a insertar
			// var tablaContenido = document.getElementById("tabla_compras").innerHTML;
			// var divCostoTotal = document.getElementById("costo_total").innerHTML;
			var cliente = document.getElementById("cliente").value;



			var a = window.open('./ticket.php?cliente='+cliente, 'PRINT', 'height=500, width=500'); 
			// a.document.write('<html>'); 
			// a.document.write('<body > <h1>Ticket N-15131213<h1> <br>'); 
			// /////////////////////////////////////////
			// // agregar elemetos html del ticket
			// // a.document.write(cliente);
			// // a.document.write(tablaContenido); 
			// // a.document.write(divCostoTotal);
			// a.document.write(htmlContent);
			// /////////////////////////////////////////
			// a.document.write('</body></html>'); 
			// a.document.close();
			// a.focus(); // necessary for IE >= 10*/
			a.print();
			//a.close();
			return true;
		}
	</script>




	<div class="col-xs-12">
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
						<?php
						header("Location: ./vender.php");
						?>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
	<form method="post" action="agregarAlCarrito.php">
			<label for="codigo">Código:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		
		<BR>
		<button onClick="form.codigo.value='ROY';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ROY</button>
		<button onClick="form.codigo.value='PR';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PR</button>
		<button onClick="form.codigo.value='ERO';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ERO</button>
		<button onClick="form.codigo.value='CHOR';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 25pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CHOR</button>
		<button onClick="form.codigo.value='BRA';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">BRA</button>
		<button onClick="form.codigo.value='PE';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PE</button>
		<button onClick="form.codigo.value='BAT';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">BAT</button>
		<button onClick="form.codigo.value='MG';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">MG</button>
		<button onClick="form.codigo.value='BG';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">BG</button>
		<button onClick="form.codigo.value='SB';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SB</button>
		<button onClick="form.codigo.value='MAL';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">MAL</button>
		
		<button onClick="form.codigo.value='SC';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SC</button>
		<button onClick="form.codigo.value='SH';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SH</button>
		<button onClick="form.codigo.value='SE';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SE</button>
		<button onClick="form.codigo.value='SP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SP</button>
		<button onClick="form.codigo.value='SAL';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SAL</button>
		<button onClick="form.codigo.value='SCH';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SCH</button>
		<button onClick="form.codigo.value='SG';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SG</button>
		<button onClick="form.codigo.value='SS';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">SS</button>
		<button onClick="form.codigo.value='PP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PP</button>
		<button onClick="form.codigo.value='PB';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PB</button>
    	<button onClick="form.codigo.value='XP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">XP</button>
	
		<button onClick="form.codigo.value='HC';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">HC</button>
		<button onClick="form.codigo.value='HP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">HP</button>
		<button onClick="form.codigo.value='CHO';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CHO</button>
		<button onClick="form.codigo.value='PD';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PD</button>
		<button onClick="form.codigo.value='FP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">FP</button>
		
		
		<button onClick="form.codigo.value='CHI';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CHI</button>
		<button onClick="form.codigo.value='GP';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">GP</button>
		<button onClick="form.codigo.value='H2O';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">H2O</button>
		
		<button onClick="form.codigo.value='INF';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">INF</button>
		<button onClick="form.codigo.value='CAF';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CAF</button>
		<button onClick="form.codigo.value='CTE';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CTE</button>
		
		
		<button onClick="form.codigo.value='H';"type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: PINK; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">H</button>
		<button onClick="form.codigo.value='Q';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: PINK; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">Q</button>
		<button onClick="form.codigo.value='J';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: PINK; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">J</button>
		<button onClick="form.codigo.value='T';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: PINK; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">T</button>

		<button onClick="form.codigo.value='LL';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 25pt; BACKGROUND-COLOR: BLUE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">LLEVA</button>
		<button onClick="form.codigo.value='MM';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 25pt; BACKGROUND-COLOR: BLUE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">MESA</button>
		
	</form>
		
		<br><br>
		<table class="table table-bordered" id="tabla_compras">
			<thead>
				<tr>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
				   	<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3 id="costo_total">TOTAL ORDEN: <?php echo number_format($granTotal,2); ?></h3>
		<form action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<input name="formapago" type="hidden" value="EFECTIVO">
			<input name="caja" type="hidden" value="110">
			<input name="usuario" type="hidden" value="MARY">
			<input name="puntoventa" type="hidden" value="ARAMBURU">
			
			<label for="cliente">Cliente:</label>
			<input autocomplete="off" autofocus class="form-control" name="cliente" required type="text" id="cliente" placeholder="Escribe el nombre del cliente" style="text-transform:uppercase;">
			<br>
			<button onClick="form.formapago.value='EFECTIVO';javascript:printTiket();" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: GREEN; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA EFECTIVO</button>
			<button onClick="form.formapago.value='TARJETA';javascript:printTiket();" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: PURPLE; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA TARJETA</button>
			<button onClick="form.formapago.value='10200';javascript:printTiket();" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: CORAL; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA 10200</button>
			<button onClick="form.formapago.value='YAPE';javascript:printTiket();" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA YAPE</button>
			<button onClick="form.formapago.value='RAPPI';javascript:printTiket();" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: MEDIUMSEAGREEN; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">RAPPI</button>
			<br>
			<br>
			<a href="./cancelarVenta.php" class="btn btn-danger" STYLE="FONT-SIZE: 12pt; BACKGROUND-COLOR: RED; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">CANCELAR ORDEN</a>
			
			<br>
			
			<br>
			<label for="cliente">CAJA: 111 / USUARIO: MARY / PUNTO DE VENTA: ARAMBURU</label>
		</form>
	</div>
<?php include_once "pie.php" ?>