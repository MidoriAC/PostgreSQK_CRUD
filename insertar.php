<?php
if(!isset($_POST["nombre"]) || !isset($_POST["apellido"])){
    exit();
}

include_once "conexion.php";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fecha = $_POST["fecha"];
$reporta = $_POST["reporta"];
$extension = $_POST["extension"];


#$sentencia2 = $base_de_datos->query("select count(empleadoid) as cod");

$sentencia = $base_de_datos->prepare("INSERT INTO empleados(nombre, apellido, fecha_nac, reporta_a, extension) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $apellido, $fecha, $reporta, $extension]);

if( $resultado === true){
    header("Location: listar.php");
}else{
    echo "Algo salio mal. Por favor, verificar que la tabla exista";
}
?>