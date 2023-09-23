<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="CodeLink" />
    <meta name="description" content="Personas Info" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="Imagenes/Acerca-de.ico" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<title>Almacen</title>

<body>
    <center>
        <h1>Almacen</h1>

        <?php
        $mysqli = new mysqli("localhost", "root", "", "api");
        $inst = $mysqli->query("select * from almacen");
        ?>
        <from>
            <table>
                <tr>
                    <td>QR</td>
                    <td>Peso</td>
                    <td>Contenido</td>
                    <td>Tipo</td>
                </tr>
                <?php
                foreach ($inst->fetch_all(MYSQLI_ASSOC) as $fila) {

                    echo '<tr>
            <td>' . $fila['QR'] . '</td>
            <td>' . $fila['Peso'] . '</td>
            <td>' . $fila['Contenido'] . '</td>
            <td>' . $fila['Tipo'] . '</td>';
                } ?>

                </tr>
                <tr>
                    <center>
                        <a href="http://localhost/quickCarry/Almacenes/eliminar.php"><input type="button" value="Eliminar" id="eliminar"></a>
                        <a href="http://localhost/quickCarry/Almacenes/agregar.php"><input type="button" value="Agregar" id="agregar"></a>
                        <a href="http://localhost/quickCarry/index.html"><input type="button" value="Volver" id="volver"></a>
                    </center>
                </tr>
            </table>
    </center>
    </from>
</body>

</html>