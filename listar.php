<?php 
include_once "conexion.php";

$sentencia = $base_de_datos->query("select empleadoid, nombre, apellido, fecha_nac, reporta_a, extension from empleados");
$empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="asets/styles.css">
    <title>Listar</title>
</head>
<body>
    <div class="contenedor">
        <div class="row">
            <div class="col-12">
             <h1>Listar con arreglo</h1>
             <br>
                <div class="table-responsive">
                    <table>
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Reporta a</th>
                                    <th>Extensión</th>
                                    <th>Editar</th>
                                    <th>Elimar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($empleado as $emp){ ?>
                                    <tr>
                                        <td><?php echo $emp->empleadoid ?></td>
                                        <td><?php echo $emp->nombre ?></td>
                                        <td><?php echo $emp->apellido ?></td>
                                        <td><?php echo $emp->fecha_nac ?></td>
                                        <td><?php echo $emp->reporta_a ?></td>
                                        <td><?php echo $emp->extension ?></td>
                                        <td><a class="btn btn-warning" href="<?php echo "editar.php?id=".$emp->empleadoid?>">Editar <img src="asets/edit26.svg" alt=""></a></td>
                                        <td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=".$emp->empleadoid?>">Eliminar <img src="asets/trash.svg" alt=""></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </div>
                  </table>
          </div>
        </div>
    </div>
</body>
</html>
