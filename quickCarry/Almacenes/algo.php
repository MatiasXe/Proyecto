<?php
/*include('../API/conexion.php');

// Verificar si se ha enviado un QR
if (isset($_POST['QR'])) {
    // Obtener el QR del formulario
    $QR = $_POST['QR'];

    // Sentencia SQL para eliminar el registro
    $sql = "DELETE FROM almacen WHERE QR = $QR";

    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($con);
    }
} else {
    echo "Por favor, proporcione un QR válido.";
}

?>