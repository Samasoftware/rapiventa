<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
$cliente = $_POST["cliente"];
$formapago =$_POST["formapago"];
$caja =$_POST["caja"];
$puntoventa =$_POST["puntoventa"];
$usuarioo =$_POST["usuario"];
$MEfectivo =$_POST["MEfectivo"];
$MTarjeta =$_POST["MTarjeta"];
$MCortesia =$_POST["MCortesia"];
$MYape =$_POST["MYape"];
$MVuelto =$_POST["MVuelto"];

if($formapago=="EFECTIVO"){
	$MEfectivo=$total;
}
if($formapago=="TARJETA"){
	$MTarjeta=$total;
}
if($formapago=="10200"){
	$MCortesia=$total;
}
if($formapago=="YAPE"){
	$MYape=$total;
}






        
        include_once "base_de_datos.php";

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

            $sentencia = $base_de_datos->prepare("SELECT concat(serie,'-',numero) numero FROM serie_numero where punto='A59';");
            $sentencia->execute();
            // $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
            $resultado = $sentencia->fetchColumn();
            return $resultado;
        }


        $cantidadDeventasActual = obtenerCantidadDeventasACtual2(); // => int
        // a ese entero lo contiveres en cadena y le agregas los cerros
        // cuando termines la venta lo agregas en db 

        

        //echo(str_pad($cantidadDeventasActual, 7, "0", STR_PAD_LEFT));
        





$correlativo = $cantidadDeventasActual;
include_once "base_de_datos.php";





$sentencia = $base_de_datos->prepare("INSERT INTO ventas(total, cliente, forma_pago, caja, punto_venta, usuario, efectivo, tarjeta, cortesia, yape, vuelto,numero) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$sentencia->execute([$total, $cliente, $formapago, $caja, $puntoventa, $usuarioo, $MEfectivo, $MTarjeta, $MCortesia, $MYape, $MVuelto,$correlativo]);

$sentencia = $base_de_datos->prepare("update serie_numero set numero=numero+1 where punto='$puntoventa';");
$sentencia->execute();

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad,precio,importe) VALUES (?, ?, ?,?,?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad,$producto->precioVenta,$producto->total]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>