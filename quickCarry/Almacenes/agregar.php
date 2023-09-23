<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="CodeLink" />
    <meta name="description" content="Personas Info" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="Imagenes/Acerca-de.ico" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

<body>
    <div class="contenedor">
        <?php
        $bd = new mysqli("localhost", "root", "", "api");
        ?>
    </div>
    <h1>Agregar datos a almacen</h1>
    <form action="botonagregar.php" method="post">
        <div class="contenedor">
            <label>QR</label>
            <input type="text" id="QR" name="QR">
        </div>

        <div class="contenedor">
            <label>Peso</label>
            <input type="text" id="peso" name="peso">
        </div>

        <div class="contenedor">
            <label>contenido</label>
            <input type="text" id="contenido" name="contenido">
        </div>

        <div class="contenedor">
            <label>Tipo</label>
            <select name="tipo" id="tipo">
                <option value="Fragil">Fragil</option>
                <option value="No fragil">No fragil</option>
            </select>
        </div>

        <input type="submit" value="Añadir">
    </form>

</body>

</html>