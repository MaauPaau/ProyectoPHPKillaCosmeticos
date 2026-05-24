<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Core\Validator;

class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAll();
        $this->render('products/list', ['products' => $products]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => Validator::clean($_POST['nombre']),
                'descripcion' => Validator::clean($_POST['descripcion']),
                'precio' => (float)$_POST['precio'],
                'stock' => (int)$_POST['stock'],
                'id_categoria' => (int)$_POST['id_categoria'],
                'imagen' => null // Implementar subida de archivos después
            ];

            if ($this->productModel->create($data)) {
                $this->redirect('/products?msg=success');
            } else {
                $this->render('products/create', ['error' => 'Error al crear producto']);
            }
        }
    }
}
