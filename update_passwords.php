<?php
require_once 'src/Config/Database.php';

use App\Config\Database;

$db = (new Database())->getConnection();
$result = $db->query("SELECT id_usuario, contraseña FROM usuarios");

while ($row = $result->fetch_assoc()) {
    $id = $row['id_usuario'];
    $pass = $row['contraseña'];
    
    // Si no parece un hash de password_hash (que empiezan por $2y$), lo hasheamos
    if (strpos($pass, '$2y$') !== 0) {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $db->prepare("UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?");
        $stmt->bind_param("si", $hashed, $id);
        $stmt->execute();
        echo "Actualizado usuario ID $id\n";
    }
}
echo "Proceso completado.\n";
