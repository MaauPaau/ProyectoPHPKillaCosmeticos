<?php
namespace App\Config;

use mysqli;
use Exception;

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: "localhost";
        $this->db_name = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: "basekilla2";
        $this->username = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: "root";
        $this->password = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: "";
    }

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
