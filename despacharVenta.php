<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("UPDATE ventas SET estado = 'DESPACHADO' WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ./monitor.php");
	exit;
}
else echo "Algo salió mal";
?>