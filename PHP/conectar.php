<?php
function conexion() {
    $conn = mysqli_connect("localhost", "root", "", "basekilla2");

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $conn;
}
?>