<?php
namespace App\Core;

use App\Config\Database;

abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id, $pk = 'id') {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE $pk = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function delete($id, $pk = 'id') {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE $pk = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
