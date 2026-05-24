<?php
namespace App\Config;

use mysqli;
use Exception;

class Database {
    private $host = "localhost";
    private $db_name = "basekilla2";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Error de conexión: " . $this->conn->connect_error);
            }
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $exception) {
            error_log("Database Error: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
