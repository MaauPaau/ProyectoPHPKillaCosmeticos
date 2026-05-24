<?php
namespace App\Models;

use App\Core\Model;

class Product extends Model {
    protected $table = 'productos';

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (nombre, descripcion, precio, stock, id_categoria, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiis", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['id_categoria'], $data['imagen']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE " . $this->table . " SET nombre = ?, descripcion = ?, precio = ?, stock = ?, id_categoria = ? WHERE id_producto = ?");
        $stmt->bind_param("ssdiii", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['id_categoria'], $id);
        return $stmt->execute();
    }

    public function search($term) {
        $searchTerm = "%$term%";
        $stmt = $this->db->prepare("SELECT p.*, c.nombre_categoria FROM " . $this->table . " p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria WHERE p.nombre LIKE ? OR p.descripcion LIKE ?");
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
