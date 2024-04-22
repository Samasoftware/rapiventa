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
			var numero = document.getElementById("correlativo").value;



			var a = window.open('./ticket.php?cliente='+cliente+'&numero='+numero+'', 'PRINT', 'height=500, width=500'); 
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
			<input autocomplete="off" class="form-control" name="Cant_Venta" required type="number" id="Cant_Venta" placeholder="Ingresar Cantidad" value="1">
		<BR>
		<button onClick="form.codigo.value='ROBO';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ROBO</button>
		<button onClick="form.codigo.value='ROEX';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ROEX</button>
		<button onClick="form.codigo.value='ROSU';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ROSU</button>
		<button onClick="form.codigo.value='ROPR';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">ROPR</button>
		<button onClick="form.codigo.value='RODE';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: ORANGE; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">RODE</button>
	
		
		<button onClick="form.codigo.value='GRES';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">GRES</button>
		<button onClick="form.codigo.value='GRPR';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: LIME GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">GRPR</button>
		
    	<button onClick="form.codigo.value='PAES';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PAES</button>
		<button onClick="form.codigo.value='PAPR';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PAPR</button>
	
		<button onClick="form.codigo.value='PISE';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PISE</button>
		<button onClick="form.codigo.value='PIHA';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: GREEN; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">PIHA</button>
		
		
		<button onClick="form.codigo.value='CAES';" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #85C1E9; WIDTH:116px; HEIGHT:80px; BORDER: BLACK 1px solid;">CAES</button>
		<BR>
		<BR>
			<button onClick="form.Cant_Venta.value='1';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">1</button>
			<button onClick="form.Cant_Venta.value='2';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">2</button>
			<button onClick="form.Cant_Venta.value='3';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">3</button>
			<button onClick="form.Cant_Venta.value='4';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">4</button>
			<button onClick="form.Cant_Venta.value='5';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">5</button>
			<button onClick="form.Cant_Venta.value='6';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">6</button>
			<button onClick="form.Cant_Venta.value='7';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">7</button>
			<button onClick="form.Cant_Venta.value='8';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">8</button>
			<button onClick="form.Cant_Venta.value='9';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">9</button>
			<button onClick="form.Cant_Venta.value='10';" type="button" class="btn btn-success" STYLE="FONT-SIZE: 30pt; BACKGROUND-COLOR: #839192; WIDTH:68px; HEIGHT:68px; BORDER: BLACK 2px solid; text-align: center; vertical-align: middle; align-items: center;">10</button>
	

		
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
			<input name="total" id="id_total" type="hidden" value="<?php echo $granTotal;?>" required>
			<input name="formapago" type="hidden" value="EFECTIVO">
			<input name="caja" type="hidden" value="1">
			<input name="usuario" type="hidden" value="MARY">
			<input name="puntoventa" type="hidden" value="A59">
			<label for="cliente">Cliente:</label>
			<input autocomplete="off" autofocus class="form-control" name="cliente"  type="text" id="cliente" placeholder="Escribe el nombre del cliente" style="text-transform:uppercase;">
			<br>
			
			
			
			<button onClick="form.formapago.value='EFECTIVO';javascript:printTiket();" id="visibilidad_efectivo"  type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: GREEN; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA EFECTIVO</button>
			<button onClick="form.formapago.value='TARJETA';javascript:printTiket();" id="visibilidad_tarjeta" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: PURPLE; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA TARJETA</button>
			<button onClick="form.formapago.value='10200';javascript:printTiket();" id="visibilidad_10200" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: CORAL; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">CORTESIA</button>
			<button onClick="form.formapago.value='YAPE';javascript:printTiket();" id="visibilidad_yape" type="submit" class="btn btn-success" STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: DARKCYAN; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">VENTA YAPE</button>
			

			<input id="mixto_visibilidad" type="hidden" value="0">
			<button class="btn btn-success" type="button" onClick="pago_mixto_visibilidad()"
			 STYLE="FONT-SIZE: 14pt; BACKGROUND-COLOR: #000; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">PAGO MIXTO</button>

			<br><br>


			<DIV id="div_mixto" hidden>
				
		<table class="table table-bordered" id="tabla_pago_mixtos">
			<thead>
			<tr>
					<th><input  class="form-control" name= "MEfectivo" value="0" id="mixto_efectivo" oninput="vuelto()" type="number" placeholder="Efectivo" style="WIDTH:140px;"></th>
					<th><input  class="form-control"  name= "MTarjeta" value="0" id="mixto_tarjeta" oninput="vuelto()" type="number" placeholder="Tarjeta" style="WIDTH:140px;"></th>
					<th><input class="form-control"  name= "MYape" value="0" id="mixto_yape" oninput="vuelto()" type="number" placeholder="Yape" style="WIDTH:140px;"></th>

					<th><input class="form-control"  name= "MCortesia" value="0" id="mixto_cortesia" oninput="vuelto()" type="number" placeholder="Cortesia" style="WIDTH:140px;"></th>

					<th><input type="" class="form-control" value="0" name= "MVuelto" id="txt_vuelto" style="WIDTH:140px;" placeholder="Vuelto" readonly></th>
					<th><button onClick="form.formapago.value='MIXTO';javascript:printTiket();" class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button></th>
					</tr>
					
					
					
			</thead>
		</table>
			</DIV>



			
		
			<br>
			<br>
			<a href="./cancelarVenta.php" class="btn btn-danger" STYLE="FONT-SIZE: 12pt; BACKGROUND-COLOR: RED; WIDTH:170px; HEIGHT:50px; BORDER: BLACK 1px solid;">CANCELAR ORDEN</a>
			
			<br>
			
			<br>
			
			<label for="puntoventa"></label>

			<label for="">CAJA: 1 / USUARIO: MARY / PUNTO DE VENTA: A59</label>
			

		</form>
	</div>
<?php include_once "pie.php" ?>