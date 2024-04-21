<?php
#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("UPDATE caja SET estado = ? WHERE idcaja = ?;");
$resultado = $sentencia->execute(["cerrado", $_GET["id"]]);

if($resultado === TRUE){
	header("Location: ./listar_caja.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la caja";
?>
