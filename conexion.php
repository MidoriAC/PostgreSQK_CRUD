<?php
$contraseña = "6782";
$usuario = "postgres";
$nombreBaseDeDatos = "prueba3";
$rutaServidor = "127.0.0.1";
$puerto = "5432";

    try {
        $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos",$usuario, $contraseña);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
    echo "Ocurrio un erro en la base de Datos".$e->getMessage();
    }

?>