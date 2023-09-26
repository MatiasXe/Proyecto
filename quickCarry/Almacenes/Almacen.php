<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CodeLink">
    <meta name="description" content="Personas Info">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="Imagenes/Acerca-de.ico">
    <link rel="stylesheet" href="../Almacenes/style-almacen.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Almacen</title>
</head>
<body>
    <div style="text-align:center;">
        <h1>Almacen</h1>

        <?php
        $mysqli = new mysqli("localhost", "root", "", "api");
        $inst = $mysqli->query("select * from almacen");
        ?>

        <table>
            <thead>
                <tr>
                    <td>QR</td>
                    <td>Peso</td>
                    <td>Contenido</td>
                    <td>Tipo</td>
                </tr>
            </thead>

            <?php
            foreach ($inst->fetch_all(MYSQLI_ASSOC) as $fila) {
                echo '<tr>
                    <td>' . $fila['QR'] . '</td>
                    <td>' . $fila['Peso'] . '</td>
                    <td>' . $fila['Contenido'] . '</td>
                    <td>' . $fila['Tipo'] . '</td>
                </tr>';
            }
            ?>
        </table>
        <a href="http://localhost/quickCarry/Almacenes/eliminar.php"><input type="button" value="Eliminar" class="boton"></a>
    </div>

    <h2 style="text-align:center;">Agregar datos a almacen</h2>
    <form action="../Almacenes/botonagregar.php" method="post">
        <div class="contenedor" style="text-align:center;">
            <label for="QR">QR</label>
            <input type="text" id="QR" name="QR">
        </div>

        <div class="contenedor" style="text-align:center;">
            <label for="peso">Peso</label>
            <input type="text" id="peso" name="peso">
        </div>

        <div class="contenedor" style="text-align:center;">
            <label for="contenido">Contenido</label>
            <input type="text" id="contenido" name="contenido">
        </div>

        <div class="contenedor" style="text-align:center;">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo">
                <option value="Fragil">Fragil</option>
                <option value="No fragil">No fragil</option>
            </select>
        </div>

        <div style="text-align:center;">
            <input type="submit" id="boton" value="Añadir">
        </div>
    </form>
</body>
</html>
