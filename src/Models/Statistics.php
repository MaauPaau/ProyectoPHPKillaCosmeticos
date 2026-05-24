<?php
namespace App\Models;

use App\Core\Model;

class Statistics extends Model {
    
    public function getTotalProducts() {
        $result = $this->db->query("SELECT COUNT(*) as total FROM productos");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getTotalStock() {
        $result = $this->db->query("SELECT SUM(stock) as total FROM productos");
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function getLowStockProducts($threshold = 10) {
        $stmt = $this->db->prepare("SELECT id_producto, nombre, stock FROM productos WHERE stock <= ?");
        $stmt->bind_param("i", $threshold);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalOrders() {
        $result = $this->db->query("SELECT COUNT(*) as total FROM pedidos");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getTotalRevenue() {
        $query = "SELECT SUM(p.precio * COUNT(dp.id_producto)) as total 
                  FROM productos p 
                  LEFT JOIN detalle_ventas dp ON p.id_producto = dp.id_producto 
                  GROUP BY p.id_producto";
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function getOrdersByStatus() {
        $result = $this->db->query("SELECT estado, COUNT(*) as cantidad FROM pedidos GROUP BY estado");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopProducts($limit = 5) {
        $query = "SELECT p.id_producto, p.nombre, COUNT(dv.id_producto) as ventas 
                  FROM productos p 
                  LEFT JOIN detalle_ventas dv ON p.id_producto = dv.id_producto 
                  GROUP BY p.id_producto 
                  ORDER BY ventas DESC 
                  LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
