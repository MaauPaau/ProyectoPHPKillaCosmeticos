<?php
namespace App\Models;

use App\Core\Model;

class Product extends Model {
    protected $table = 'productos';
    protected $pk = 'id_producto';

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO " . $this->table . " (nombre, descripcion, precio, stock, id_categoria, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiis", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['id_categoria'], $data['imagen']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE " . $this->table . " SET nombre = ?, descripcion = ?, precio = ?, stock = ?, id_categoria = ?, imagen = ? WHERE id_producto = ?");
        $stmt->bind_param("ssdiiis", $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['id_categoria'], $data['imagen'], $id);
        return $stmt->execute();
    }

    public function search($term, $limit = 10, $offset = 0) {
        $searchTerm = "%$term%";
        $stmt = $this->db->prepare("SELECT p.*, c.nombre_categoria FROM " . $this->table . " p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria WHERE p.nombre LIKE ? OR p.descripcion LIKE ? LIMIT ? OFFSET ?");
        $stmt->bind_param("ssii", $searchTerm, $searchTerm, $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countSearch($term) {
        $searchTerm = "%$term%";
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM " . $this->table . " WHERE nombre LIKE ? OR descripcion LIKE ?");
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'] ?? 0;
    }

    public function getPaginated($limit = 10, $offset = 0) {
        $stmt = $this->db->prepare("SELECT p.*, c.nombre_categoria FROM " . $this->table . " p LEFT JOIN categorias c ON p.id_categoria = c.id_categoria LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function countAll() {
        $result = $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }
}
