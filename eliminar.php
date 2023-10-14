<?php 
include_once "conexion.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtener el ID del registro a eliminar
    $id = $_GET['id'];

    try {
        // Sentencia SQL para eliminar el registro
        $sql = "DELETE FROM empleados WHERE empleadoid = :id";

        // Preparar la sentencia SQL
        $stmt = $base_de_datos->prepare($sql);

        // Vincular el valor del ID
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la sentencia SQL
        if ($stmt->execute()) {
            // Redirigir de vuelta a la página de lista después de eliminar
            header("Location: listar.php");
            exit;
        } else {
            echo "Error al eliminar el registro";
        }
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
    }
} else {
    echo "ID de registro no válido";
}

?>