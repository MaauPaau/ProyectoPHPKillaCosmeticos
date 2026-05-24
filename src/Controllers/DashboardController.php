<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Statistics;

class DashboardController extends Controller {
    private $statsModel;

    public function __construct() {
        $this->statsModel = new Statistics();
    }

    public function index() {
        $this->checkAuth();

        $data = [
            'title' => 'Dashboard - Killa Cosméticos',
            'totalProducts' => $this->statsModel->getTotalProducts(),
            'totalStock' => $this->statsModel->getTotalStock(),
            'totalOrders' => $this->statsModel->getTotalOrders(),
            'totalRevenue' => $this->statsModel->getTotalRevenue(),
            'lowStockProducts' => $this->statsModel->getLowStockProducts(10),
            'topProducts' => $this->statsModel->getTopProducts(5),
            'ordersByStatus' => $this->statsModel->getOrdersByStatus()
        ];

        $this->render('dashboard/inventory', $data);
    }
}
