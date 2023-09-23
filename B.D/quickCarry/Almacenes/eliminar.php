<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="CodeLink" />
    <meta name="description" content="Personas Info" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="Imagenes/Acerca-de.ico"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <h1>Agregar datos a almacen</h1>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "api");
    $inst = $mysqli->query("select * from almacen");
    ?>

    <form action="botoneliminar.php" method="post">
        <div class="contenedor">
            <label>Seleccione un QR para eliminar</label>
            <br>
            <select id="QR" name="QR">
                <?php
                while ($fila = $inst->fetch_assoc()) {
                    echo "<option value=" . $fila['QR'] . ">" . $fila['QR'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Formulario para eliminar datos -->

        <p>¿Seguro que deseas eliminar todos los datos de la tabla?</p>
        <input type="submit" name="eliminar" value="Eliminar Datos">
    </form>
</body>

</html>