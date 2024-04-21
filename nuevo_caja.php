<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];

$sentencia = $base_de_datos->prepare("INSERT INTO caja(caja_chica, usuario, punto) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$codigo, "usuario", "punto"]);

if($resultado === TRUE){
	header("Location: ./caja.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>