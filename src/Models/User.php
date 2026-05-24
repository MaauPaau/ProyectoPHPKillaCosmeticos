<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected $table = 'usuarios';

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['nombre'], $data['email'], $hashedPassword, $data['rol']);
        return $stmt->execute();
    }

    public function verifyLogin($email, $password) {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['contraseña'])) {
            return $user;
        }
        return false;
    }
}
