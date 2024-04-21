<?php
session_start();
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>


<!DOCTYPE html>
<html>
<title>

</title>

<head>
</head>

<style>
    * {
        font-size: 12px;
        font-family: "Times New Roman";
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 75px;
        max-width: 75px;
    }

    td.cantidad,
    th.cantidad {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 155px;
        max-width: 155px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }
</style>

<body>
    <div class="ticket">


        <?php

        include_once "base_de_datos.php";

        function obtenerCantidadDeventasACtual()
        {

            $contraseña = "DYmy7Bn23Dz5amrF";
            $usuario = "es01_user";
            $nombre_base_de_datos = "es01_db";
            try {
                $base_de_datos = new PDO('mysql:host=162.243.230.209;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
                $base_de_datos->query("set names utf8;");
                $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
                $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $e) {
                echo "Ocurrió algo con la base de datos: " . $e->getMessage();
            }

            $sentencia = $base_de_datos->prepare("SELECT COUNT(*) FROM ventas;");
            $sentencia->execute();
            // $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
            $resultado = $sentencia->fetchColumn();
            return $resultado;
        }


        $cantidadDeventasActual = obtenerCantidadDeventasACtual(); // => int
        // a ese entero lo contiveres en cadena y le agregas los cerros
        // cuando termines la venta lo agregas en db 

        function generate_invoice_numbers($inicio, $contador, $longitud)
        {
            $resultado = array();
            for ($n = $inicio; $n < $inicio + $contador; $n++) {

                $resultado[] = str_pad($n, $longitud, "0", STR_PAD_LEFT);
            }
            return $resultado;
        }
        $numeros = generate_invoice_numbers(1, 20, 8);
        // print_r($numeros);

        // print_r($cantidadDeventasActual);

        //print_r(str_pad($cantidadDeventasActual, 5, "0", STR_PAD_LEFT));

        ?>

        <p class="centrado">Narvaez<br>        <?php
        echo "Ticket Nº " . $_GET["numero"];
        /*include_once "base_de_datos.php";

        function obtenerCantidadDeventasACtual2()
        {

            $contraseña = "DYmy7Bn23Dz5amrF";
            $usuario = "es01_user";
            $nombre_base_de_datos = "es01_db";
            try {
                $base_de_datos = new PDO('mysql:host=162.243.230.209;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
                $base_de_datos->query("set names utf8;");
                $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
                $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $e) {
                echo "Ocurrió algo con la base de datos: " . $e->getMessage();
            }

            $sentencia = $base_de_datos->prepare("SELECT COUNT(*) FROM ventas;");
            $sentencia->execute();
            // $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
            $resultado = $sentencia->fetchColumn();
            return $resultado;
        }


        $cantidadDeventasActual = obtenerCantidadDeventasACtual2(); // => int
        // a ese entero lo contiveres en cadena y le agregas los cerros
        // cuando termines la venta lo agregas en db 

        

        print_r(str_pad($cantidadDeventasActual, 7, "0", STR_PAD_LEFT));*/
        



        ?>
        <br>
            <br>
            <br>




            <?php
            if (isset($_GET["detalles"])){
             echo $_GET["fecha"];
            }else{
                date_default_timezone_set("America/Lima");
                echo date("d-m-Y   h:i a");
            }
                ?>




            <?php
            if (isset($_GET["cliente"])) {
                echo "<h2>Cliente : " . $_GET["cliente"] . "</h2>";
            } else {
                echo "<h2>Cliente : NO HAY UN CLIENTE</h2>";
            }
            ?>


        <table>
            <thead>
                <tr>
                    <!-- <th>CANT</th>
                        <th>PRODUCTO</th>
                        <th>$$</th> -->
                    <th>Descripción</th>
                    <th>Precio </th>
                    <th>Cant</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                        <td>1.00</td>
                        <td>CHEETOS VERDES 80 G</td>
                        <td>$8.50</td>
                    </tr>
                    <tr>
                        <td>2.00</td>
                        <td>KINDER DELICE</td>
                        <td>$10.00</td>
                    </tr>
                    <tr>
                        <td>1.00</td>
                        <td>COCA COLA 600 ML</td>
                        <td>$10.00</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL</td>
                        <td>$28.50</td>
                    </tr> -->

                    <?php
            if (isset($_GET["detalles"])) {
                ?>





<?php foreach(explode("__", $_GET["detalles"]) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
			
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[3] ?></td>
                                    <td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[4] ?></td>
								</tr>
								<?php } ?>






              <?php 
            } else {
             ?>






<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
                    $granTotal += $producto->total;
                ?>
                    <tr>
                        <td><?php echo $producto->descripcion ?></td>
                        <td><?php echo $producto->precioVenta ?></td>
                        <td><?php echo $producto->cantidad ?></td>
                        <td><?php echo $producto->total ?></td>
                    </tr>
                <?php } 
    
                ?>





            <?php 
            }
            ?>





                
            </tbody>
        </table>
        <?php
            if (isset($_GET["detalles"])) {
                ?>
<h3 id="costo_total">TOTAL ORDEN: S/<?php echo number_format($_GET["total"], 2); ?></h3>
<?php }else{?>

    <h3 id="costo_total">TOTAL ORDEN: S/<?php echo number_format($granTotal, 2); ?></h3>

         <?php } ?>

        

        <p class="centrado">¡PUESTO A59 - MERCADO MAYORISTA - GRACIAS POR SU COMPRA!<br>
    </div>
</body>

</html>