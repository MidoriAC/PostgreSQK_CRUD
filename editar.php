<?php
include_once "conexion.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtener el ID del registro a editar
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Procesar el formulario de edición aquí

        // Obtener los datos actualizados del formulario
        $nuevoNombre = $_POST['nombre'];
        $nuevoApellido = $_POST['apellido'];
        $nuevoFecha = $_POST['fecha'];
        $nuevoReporta = $_POST['reporta'];
        $nuevoExtension = $_POST['extension'];

        try {
            // Sentencia SQL para actualizar el registro
            $sql = "UPDATE empleados SET nombre = :nombre, apellido = :apellido, fecha_nac = :fecha, reporta_a = :reporta, extension = :extension WHERE empleadoid = :id";

            // Preparar la sentencia SQL
            $stmt = $base_de_datos->prepare($sql);

            // Vincular los valores
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $nuevoApellido, PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $nuevoFecha, PDO::PARAM_STR);
            $stmt->bindParam(':reporta', $nuevoReporta, PDO::PARAM_STR);
            $stmt->bindParam(':extension', $nuevoExtension, PDO::PARAM_STR);

            // Ejecutar la sentencia SQL
            if ($stmt->execute()) {
                // Redirigir de vuelta a la página de lista después de editar
                header("Location: listar.php");
                exit;
            } else {
                echo "Error al actualizar el registro";
            }
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    } else {
        // Obtener los datos del registro a editar
        try {
            $sql = "SELECT nombre, apellido, fecha_nac, reporta_a, extension FROM empleados WHERE empleadoid = :id";
            $stmt = $base_de_datos->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $nombre = $resultado['nombre'];
                $apellido = $resultado['apellido'];
                #$fecha = $resultado['fecha'];
                #$reporta = $resultado['reporta'];
                $extension = $resultado['extension'];
                
            } else {
                echo "Registro no encontrado";
                exit;
            }
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
} else {
    echo "ID de registro no válido";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="asets/styles.css">
    <title>Editar</title>
</head>
<body>
    <div class="contenedor">

    
    <div class="row">
        <div class="col-12">
            <h1>Editar Registro</h1>
            <br>
            <form method="POST">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>">
                </div>
                
                <div class="form-group">
                    <label form="extension">Extensión</label>
                    <input name="extension" type="text" id="extension" value="<?php echo $extension; ?>">
                </div>
                <div>
                    <input type="submit" value="Guardar Cambios">
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
