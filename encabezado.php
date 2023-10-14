<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <title>PostgreSQL</title>
    <link rel="stylesheet" href="asets/styles.css">
    
</head>
<body>
    <div class="contenedor">
        <div class="row">
            <div class="col-12">
                <h1>Ingreso de Datos</h1>
                <form action="insertar.php" method="POST">
                    <div class="form-group">
                        <label form="nombre">Nombre</label>
                        <input require name ="nombre" type="text" id="nombre" placeholder="Nombre del Empleado">
                    </div>
                    <div class="form-group">
                        <label form="apellido">Apellido</label>
                        <input require name ="apellido" type="text" id="apellido" placeholder="Apellido del Empleado">
                    </div>
                    <div class="form-group">
                        <label form="fecha">Fecha de Nacimiento</label>
                        <input require name ="fecha" type="date" id="fecha" placeholder="Fecha de Nacimiento">
                    </div>
                    <div class="form-group">
                        <label form="reporta">Reporta a</label>
                        <input require name ="reporta" type="number" id="reporta" placeholder="¿A quién reporta?">
                    </div>
                    <div class="form-group">
                        <label form="extension">Extensión</label>
                        <input require name ="extension" type="number" id="extension" placeholder="Número de extensión">
                    </div>
                    <button type="submit" class="btn btn-success">GUARDAR</button>
                    <a href="./listar.php"  class="btn btn-warning">Ver Todas</a>
                </form>
            </div>
        </div>
    </div>       
</body>
</html>